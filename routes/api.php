<?php

use App\Http\Middleware\AttachSentryUserContext;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostController;

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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts',          'API\PostController@index')->name('api.posts.index');

Route::get( '/post/{id}',   'API\PostController@show')->name('api.post.show');
Route::post('/post',        'API\PostController@store')->name('api.post.store');

//Route::get( '/post/new',    'API\PostController@create')->name('api.post.create');

Route::get('/post/{id}/edit', 'API\PostController@edit')->name('api.post.edit');
Route::put('/post/{id}', 'API\PostController@update')->name('api.post.update');
Route::delete('/post/{id}', 'API\PostController@destroy')->name('api.post.destroy');

Route::group(['middleware' => ['auth']], function () {


});

