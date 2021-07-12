<?php

use Illuminate\Support\Facades\Route;


Route::get('/posts', function () {
    return view('app');
});

// Route::get('/{any}', function(){
//     return view('app');
// })->where('any','.*');


Route::get('/ongkir', 'CheckOngkirController@index');
Route::post('/ongkir', 'CheckOngkirController@check_ongkir');
Route::get('/cities/{province_id}', 'CheckOngkirController@getCities');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * socialite auth
 */
Route::get('/auth/{provider}', 'Auth\SocialiteController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'Auth\SocialiteController@handleProvideCallback');
