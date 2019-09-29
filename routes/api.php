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

Route::middleware('auth:api')->get('/profile','API\UserController@getUser');

Route::post('register', 'API\UserController@register');
Route::post('login',    'API\UserController@login');


Route::group(['middleware' => 'auth:api'], function() {
    Route::get(     '/post/{post}', 'API\PostController@show');

    Route::post('logout',   'API\UserController@logout');
});

Route::get(     '/posts',       'API\PostController@index')->name('api.posts.index');
//Route::get('/post/{post}', 'API\PostController@show')->name('api.post.show')->middleware('auth:api');
Route::post(    '/post',        'API\PostController@store')->name('api.post.store');
Route::put(     '/post/{post}', 'API\PostController@update')->name('api.post.update');
Route::delete(  '/post/{post}', 'API\PostController@destroy')->name('api.post.destroy');



/*
Route::middleware('auth:api')->group(function () {
    Route::get('/post/{post}', 'API\PostController@show')->name('api.post.show');
});
*/
/*
Route::group(['middleware' => 'auth:api'], function () {
    Route::get(     '/post/{post}', 'API\PostController@show')->name('api.post.show');
});
*/
