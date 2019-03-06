<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user', 'API\UserController@index');
Route::post('/user', 'API\UserController@store');
Route::get('/user/{user}', 'API\UserController@show');
Route::put('/user/{user}', 'API\UserController@update');
Route::delete('/user/{user}', 'API\UserController@destroy');

