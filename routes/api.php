<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => '/post'], function(){
	Route::get('/', 'PostController@index')->name('post.list');
	Route::get('/{post}', 'PostController@show')->name('post.show');
	
	Route::middleware(['auth:api'])->group(function(){
		Route::post('/', 'PostController@store')->name('post.store')->middleware('add_owner');
		Route::patch('/{post}', 'PostController@update')->name('post.update')->middleware('post_owner');
		Route::delete('/{post}', 'PostController@destroy')->name('post.delete')->middleware('post_owner');
	});
});