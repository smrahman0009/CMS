<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/','WelcomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();



Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('categories', 'CategoriesController');

    Route::resource('tags', 'TagsController');

    Route::resource('post', 'PostController');

    Route::get('trashed-post', 'PostController@trashed')->name('trashed-post');

    Route::post('restore-post/{post_id}', 'PostController@restore')->name('restore-post');

    
});

Route::middleware(['auth','admin'])->group(function(){
    Route::get('user','UserController@index')->name('user-list');
    Route::get('user/edit-profile','UserController@edit')->name('user.profile-edit');
    Route::put('user/update-profile','UserController@update')->name('user.profile-update');
    Route::post('user/{user_id}/change-type', 'UserController@changeType')->name('user.change-type');
});
