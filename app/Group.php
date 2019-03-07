<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'pivot'
    ];
    public function users()
    {
        return $this->belongsToMany('App\User', 'group_user', 'group_id', 'user_id');
    }
}
