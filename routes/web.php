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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admin routes
Route::group(array('prefix'=>'admin','middleware' => ['auth']), function ()
{
	Route::post('/post-url','AdminController@store');
	Route::get('/', 'AdminController@index');
	Route::get('dashboard', 'AdminController@index');
});

Route::get('/video-tutorials', 'HomeController@fetchVideos')->name('home');
Route::get('/tweet-snippets', 'HomeController@fetchTweets')->name('home');
