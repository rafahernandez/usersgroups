<?php

namespace App\Http\Controllers\API;

use App\Group;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Group::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=> 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['msg'=>$validator->errors()->first()], 400);
        } 
        $group = new Group;
        $group->name =  $request->name;
        $group->save();

        return response()->json(['msg'=>'Group created','id'=>$group->id], 201); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return $group->load('users');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $rules = [
            'name'=> 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['msg'=>$validator->errors()->first()], 400);
        }   
        
        $group->name =  $request->name;
        $group->save();

        return response()->json(['msg'=>'Group updated'], 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        if(count($group->users)){
            return response()->json(['msg'=>"Can't delete, group has users."], 409); 
        }
        $group->delete();
        return response()->json(['msg'=>'Group deleted'], 200); 
    }

    /**
     * Adds a user to a group
     *
     * @param  \App\Group  $group
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function assignUser(Request $request, Group $group){
        $rules = [
            'user_id'=> 'required|exists:users,id',
        ];
        $validator = Validator::make($request->only(['user_id']), $rules);
        if ($validator->fails()) {
            return response()->json(['msg'=>$validator->errors()->first()], 400);
        } 
        $user = User::find($request->user_id);

        if($group->users->contains($user)){
            return response()->json(['msg'=>"User already in group."], 409); 
        }
        $group->users()->attach($user);
        return response()->json(['msg'=>'User added to group'], 200); 
    }

    /**
     * Removes a user from a group
     *
     * @param  \App\Group  $group
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function dismissUser(Request $request, Group $group){
        $rules = [
            'user_id'=> 'required|exists:users,id',
        ];
        $validator = Validator::make($request->only(['user_id']), $rules);
        if ($validator->fails()) {
            return response()->json(['msg'=>$validator->errors()->first()], 400);
        } 
        $user = User::find($request->user_id);

        if(!$group->users->contains($user)){
            return response()->json(['msg'=>"User not in group."], 409); 
        }
        $group->users()->detach($user);
        return response()->json(['msg'=>'User removed from group'], 200); 
    }
}
