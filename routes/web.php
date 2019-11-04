<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/search', 'SearchController@users');

Route::get('/user_avatar/{id}/{size}', 'ImagesController@user_avatar');

Route::get('/default_avatar/{sex}/{size}', 'ImagesController@default_avatar');

Route::resource('/users', 'UsersController', ['except' => ['create', 'store', 'index']]);

// friends
Route::get('users/{user}/friends', 'FriendsController@index');
Route::delete('/friends/{friend_id}', 'FriendsController@destroy');
Route::patch('/friends/{friend_id}', 'FriendsController@accept');
Route::post('/friends/{friend_id}', 'FriendsController@add');

