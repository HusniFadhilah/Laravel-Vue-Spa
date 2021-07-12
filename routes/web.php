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

Route::get('/posts', function () {
    return view('app');
});

// Route::get('/{any}', function(){
//     return view('app');
// })->where('any','.*');


Route::get('/ongkir','CheckOngkirController@index');
Route::post('/ongkir','CheckOngkirController@check_ongkir');
Route::get('/cities/{province_id}','CheckOngkirController@getCities');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * socialite auth
 */
Route::get('/auth/{provider}', 'Auth\SocialiteController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'Auth\SocialiteController@handleProvideCallback');
