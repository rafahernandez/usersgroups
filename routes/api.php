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

Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});


//Remove this middleware to test without authentication
Route::group(['middleware' => ['auth:api']], function () {
    //Can be reduced with Route::resource, left as verbose for this exercise
    Route::get('/user', 'API\UserController@index');
    Route::post('/user', 'API\UserController@store');
    Route::get('/user/{user}', 'API\UserController@show');
    Route::put('/user/{user}', 'API\UserController@update');
    Route::delete('/user/{user}', 'API\UserController@destroy');

    Route::get('/group', 'API\GroupController@index');
    Route::post('/group', 'API\GroupController@store');
    Route::get('/group/{group}', 'API\GroupController@show');
    Route::put('/group/{group}', 'API\GroupController@update');
    Route::delete('/group/{group}', 'API\GroupController@destroy');

    Route::post('/group/{group}/assignUser', 'API\GroupController@assignUser');
    Route::post('/group/{group}/dismissUser', 'API\GroupController@dismissUser');
});


