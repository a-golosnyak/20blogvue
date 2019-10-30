<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'API\UserController@register');
Route::post('login',    'API\UserController@login');



Route::get(     '/post',       'API\PostController@index')->name('api.post.index');

Route::group(['middleware' => 'auth:api'], function() {
    Route::get(     '/post/{post}', 'API\PostController@show')->name('api.post.show');
    Route::post(    '/post',        'API\PostController@store')->name('api.post.store');
    Route::put(     '/post/{post}', 'API\PostController@update')->name('api.post.update');
    Route::delete(  '/post/{post}', 'API\PostController@destroy')->name('api.post.destroy');

    Route::get(     '/comment/{post}', 'API\CommentPostController@index');
    Route::post(    '/comment','API\CommentController@store')->name('api.comment.store');
    Route::put(     '/comment/{comment}', 'API\CommentController@update')->name('api.comment.update');
    Route::delete(  '/comment/{comment}', 'API\CommentController@destroy')->name('api.comment.destroy');

    Route::get(     '/user/{user}', 'API\UserController@show')->name('api.user.show');
    Route::put(     '/user/{user}', 'API\UserController@update')->name('api.user.update');
    Route::post(    'logout',   'API\UserController@logout');
});

