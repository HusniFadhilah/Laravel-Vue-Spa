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

Route::get('/posts','PostController@index');
Route::post('/posts/store','PostController@store');
Route::get('/posts/{id?}','PostController@show');
Route::post('/posts/update/{id?}','PostController@update');
Route::post('/posts/{id?}','PostController@destroy');
