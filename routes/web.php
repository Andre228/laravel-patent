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

Route::group(['namespace' => 'Museum', 'prefix' => 'museum'], function () {
   Route::resource('posts', 'PostController')->names('museum.posts');
});


Route::resource('rest','RestController')->names('restTest');


Route::get('/posts', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/posts', 'SpaController@index')->where('any', '.*');
//Route::get('/home', 'WelcomeController@index')->name('home');

//Route::get('/home', 'HomeController@index')->name('home');
