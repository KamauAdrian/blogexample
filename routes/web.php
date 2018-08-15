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

//loads the home/main page
Route::get('/','PostsController@index')->name('home');

//creating new posts
Route::get('/post/create','PostsController@create')->name('get-create');
Route::post('/create','PostsController@store')->name('create');

//show the posts
Route::get('/{post}','PostsController@show');

//add comments to a post
Route::post('/{post}/comments','CommentsController@store');

//register new user
Route::get('/do/register','RegistrationsController@index')->name('reg-form');
Route::post('/register','RegistrationsController@store')->name('register');


//log the user in
Route::get('/user/login','SessionsController@create')->name('get-login');
Route::post('/login','SessionsController@store')->name('login');

//log out the user
Route::get('/user/logout','SessionsController@destroy');

