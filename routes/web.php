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
Route::get('/','PostsController@index');


//creating new posts
Route::get('/post/create','PostsController@create')->name('get-create');
Route::post('/create','PostsController@store')->name('create');

//show the posts
Route::get('/{post}','PostsController@show');

//edit the post
Route::get('/{post}/edit','PostsController@edit')->name('edit');
Route::put('/edit/{post}','PostsController@update');

//delete the post
Route::get('/{post}/delete','PostsController@destroy')->name('delete-post');

//add comments to a post
Route::post('/{post}/comments','CommentsController@store');

//register new user
Route::get('/do/register','RegistrationsController@index')->name('reg-form');
Route::post('/register','RegistrationsController@store')->name('register');


//log the user in
Route::get('/user/login','SessionsController@create')->name('get-login');
Route::post('/login','SessionsController@store')->name('login');

//log out the user
Route::any('/user/logout','SessionsController@destroy')->name('user-logout');

Route::group(['middleware'=>'auth'],function(){


});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
