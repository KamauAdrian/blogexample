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

////loads the home/main page
Route::get('/','PostsController@index');
//creating new posts
Route::get('/create','PostsController@create');
Route::post('/create','PostsController@store')->name('create');

//show the posts
Route::get('/{post}','PostsController@show');
//add comments to a post
Route::post('/{post}/comments','CommentsController@store');


Route::get('/register','RegistrationsController@index');
Route::post('/register','RegistrationsController@store')->name('register');
