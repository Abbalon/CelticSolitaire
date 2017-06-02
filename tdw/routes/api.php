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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get('/admin', 'UserController@ListValidatePlayer');
Route::get('/user/{id}', 'UserController@SelectById');
Route::get('/admin/{id}', 'UserController@SelectById');

Route::put('/admin/{id}', 'UserController@UpdateUser');
Route::put('/admin/validate/{id}', 'UserController@ValidatePlayer');
Route::put('/user', 'UserController@UpdateUser');

Route::delete('/admin', 'UserController@DropUser');
Route::delete('/admin/{id}', 'UserController@DeleteUser');

Route::post('/admin', 'UserController@NewUser');
Route::post('/user', 'UserController@NewUser');

Route::post('/game', 'GameController@NewGame');

Route::get('/game/dates', 'GameController@SelectBetween');
Route::get('/game', 'GameController@SelectScores');
Route::get('/game/{id}', 'GameController@SelectAll');

Route::put('/game', 'GameController@Save');
//TODO Restore

//Route::get('/login','AccessController@GetAccess');
