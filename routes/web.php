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

// Social login callback route
Route::get('login/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback');


Route::middleware(['guest'])->group(function (){
	Route::get('/', 'HomeController@index')->name('home');
});