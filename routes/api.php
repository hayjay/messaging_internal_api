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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'message', 'namespace' => 'Api'], function(){
	Route::post('/store', 'MessageController@store')->name('api_store_message');
	Route::get('/all', 'MessageController@index')->name('api_message_all');
});

Route::group(['prefix' => 'authors'], function(){
	Route::get('/', 'AuthorController@index')->name('api_authors');
});