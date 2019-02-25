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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/tweet', 'TweetsController@update');

Route::get('/users', 'UsersController@index')->name('user_list');
Route::post('/users/follow/{follow_id}', 'UsersController@follow');
Route::post('/users/follow/{follow_id}/delete', 'UsersController@destroy');
