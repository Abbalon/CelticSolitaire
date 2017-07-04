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

Route::get('/admin', 'UserController@ListValidatePlayer');//Shows the players pendding to validate
Route::get('/admin/average', 'UserController@ListAverage');//Shows the average Score
Route::get('/admin/game', 'GameController@SelectAll');//Shows all games
Route::get('/users', 'UserController@SelectAll');//Shows all users in the system
Route::get('/user/{id}', 'UserController@SelectById');//Shows the user's info
Route::get('/admin/{id}', 'UserController@SelectById');//Shows the user's info

Route::put('/admin/{id}', 'UserController@UpdateUser');//The admin update the user's data
Route::put('/admin/validate/{id}', 'UserController@ValidatePlayer');//Validate the selected player
Route::put('/user/{id}', 'UserController@UpdateUser');//The user auto-update own data

Route::delete('/admin', 'UserController@DropUser');//Disallow the loggin
Route::delete('/admin/{id}', 'UserController@DeleteUser');//Delete de user

Route::post('/admin', 'UserController@NewUser');//create a new User
Route::post('/user', 'UserController@NewUser');//Create a new User


Route::get('/game/dates', 'GameController@SelectBetween');//Shows all match between 2 dates
Route::get('/game/{id}', 'GameController@SelectScores');//Shows the best 5
Route::get('/game', 'GameController@SelectLast');//Shows the last

Route::put('/game/{id}', 'GameController@Save');//updateGame

Route::get('/restore', 'GameController@Restore');//restore the match

Route::delete('/game/{id}', 'GameController@DeleteMatch');//Delete the selected match

Route::post('/newGame', 'GameController@NewGame');//create new game
