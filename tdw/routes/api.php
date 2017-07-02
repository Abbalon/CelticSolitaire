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

Route::get('/admin', 'UserController@ListValidatePlayer');
Route::get('/admin/average', 'UserController@ListAverage');
Route::get('/users', 'UserController@SelectAll');
Route::get('/user/{id}', 'UserController@SelectById');
Route::get('/admin/{id}', 'UserController@SelectById');

Route::put('/admin/{id}', 'UserController@UpdateUser');
Route::put('/admin/validate/{id}', 'UserController@ValidatePlayer');
Route::put('/user/{id}', 'UserController@UpdateUser');

Route::delete('/admin', 'UserController@DropUser');
Route::delete('/admin/{id}', 'UserController@DeleteUser');

Route::post('/admin', 'UserController@NewUser');
Route::post('/user', 'UserController@NewUser');

Route::post('/game', 'GameController@NewGame');//create new game

Route::get('/game/dates', 'GameController@SelectBetween');//Shows all match between 2 dates
Route::get('/game/{id}', 'GameController@SelectScores');//Shows the best 5
Route::get('/game', 'GameController@SelectAll');//Shows the last

Route::put('/game/{id}', 'GameController@Save');//updateGame

Route::get('/restore', 'GameController@Restore');//restore the match
