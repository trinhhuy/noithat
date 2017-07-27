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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', 'DashboardController@index');

    Route::get('profile', 'ProfileController@edit');
    Route::put('profile', 'ProfileController@update');
    Route::get('profile/password', 'ProfileController@editPassword');
    Route::put('profile/password', 'ProfileController@updatePassword');

    // Users
    Route::get('users/datatables', 'UsersController@getDatatables')->name('users.datatables');
    Route::resource('users', 'UsersController');
    Route::get('users/{user}/permissions', 'UserPermissionsController@index')->name('userPermissions.index');
    Route::put('users/{user}/permissions', 'UserPermissionsController@update')->name('userPermissions.update');

    // Categories
    Route::get('categories/datatables', 'CategoriesController@getDatatables')->name('categories.datatables');
    Route::resource('categories', 'CategoriesController');

    // Posts
    Route::get('posts/datatables', 'PostsController@getDatatables')->name('posts.datatables');
    Route::resource('posts', 'PostsController');

    // Posts
    Route::get('images/datatables', 'SlidesController@getDatatables')->name('images.datatables');
    Route::resource('images', 'SlidesController');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/{slug}', 'HomeController@category')->name('category');
Route::get('/{category}/{post}', 'HomeController@postDetail')->name('postDetail');

