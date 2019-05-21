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

use App\Models\Image;
use App\Repositories\PostRepository;
use App\Http\Controllers\Museum\PostController;

Route::get('/', function () {

    $postRepository = app(PostRepository::class);

    $listwelcomeposts = $postRepository->getNewPosts();

    for($i=0; $i < count($listwelcomeposts); $i++){
        $id[] = $listwelcomeposts[$i]['id'];
    }

    $image = new Image();

    for($i=0; $i < count($id); $i++) {
        $alias[] = $image
            ->select('alias')
            ->where('post_id', $id[$i])
            ->limit(1)
            ->get()
            ->toArray();
    }

    for($i=0; $i < count($alias); $i++) {
        if(!empty($alias[$i][0]))
        $aliasfiltred[] = $alias[$i][0];
    }
    return view('welcome', compact('aliasfiltred', 'listwelcomeposts'));
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/contact', 'HomeController@contact')->name('contact')->middleware('auth');
Route::put('/home/{id}', 'HomeController@update')->name('dashboard.edit')->middleware('auth');



//$groupDataRegister = [
//    'prefix' => '/museum/vss',
//];

//регистрация
//Route::group(['middleware' => 'guest'], function () {
//    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register.form');
//    Route::post('/register', 'Auth\RegisterController@register')->name('register.store');
//});
//
//Route::group(['middleware' => 'auth'], function () {
//    Route::get('/account', 'Museum\AccountController@index')->name('acc');
//});



Route::group(['namespace' => 'Museum', 'prefix' => 'museum'], function () {

   Route::resource('posts', 'PostController')
       ->names('museum.posts')
       ->middleware('auth');


});

Route::get('posts/count', 'Museum\PostController@showWithCountPosts')
    ->name('museum.show.count')
    ->middleware('auth');

Route::get('/about', 'HomeController@about')
    ->name('museum.about');



$groupData = [
    'namespace' => 'Museum\Admin',
    'prefix' => 'admin/museum',
    'middleware' => ['admin']
];

Route::group($groupData, function () {

    //Category
    $methods = ['index', 'edit', 'store', 'update', 'create', 'show', 'destroy'];
    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('museum.admin.categories');

    //Image
    Route::resource('images', 'ImageController')
        ->only('destroy','update')
        ->names('museum.admin.images');

    //Post
    Route::resource('posts', 'PostController')
        ->except(['show'])
        ->names('museum.admin.posts');

    //User
    Route::resource('users', 'UserController')
        ->except(['show','create'])
        ->names('museum.admin.users');
});



