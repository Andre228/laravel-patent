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

Route::group(['namespace' => 'Museum', 'prefix' => 'museum'], function () {
   Route::resource('posts', 'PostController')->names('museum.posts');
});


$groupData = [
    'namespace' => 'Museum\Admin',
    'prefix' => 'admin/museum',
];

Route::group($groupData, function () {

    //Category
    $methods = ['index', 'edit', 'store', 'update', 'create', 'show', 'destroy'];
    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('museum.admin.categories');

    //Post
    Route::resource('posts', 'PostController')
        ->except(['show'])
        ->names('museum.admin.posts');
});



