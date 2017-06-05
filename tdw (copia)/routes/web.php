<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function () {
  if(Auth::user()->isAdmin == 1){
    return view('admin');
  }
  else {
    return redirect('user');
  }
})->name('admin')->middleware('auth');

Route::get('/user', function () {
    return view('user');
})->name('user')->middleware('auth');
