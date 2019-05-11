<?php

/*
|--------------------------------------------------------------------------
| Associate Routes
|--------------------------------------------------------------------------
|
| Here is where you can register associate routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "associate" middleware group. Now create something great!
|
*/

Route::get('login/{provider}', 'Auth\SocialAccountController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback');

Route::middleware(['guest:associate'])->namespace('Associate')->group(function (){

	Route::get('login', 'AccountController@showLoginForm')->name('associate.login');
	Route::post('login', 'AccountController@login')->name('associate.login.submit');

	Route::get('/create', 'AccountController@create')->name('associate.create');
	Route::post('/store', 'AccountController@store')->name('associate.store');
});

Route::get('logout', 'Associate\AccountController@logout')->name('associate.logout');

Route::middleware(['auth:associate'])->namespace('Associate')->group(function (){
	
	Route::get('/', 'HomeController@index')->name('associate.index');
	Route::get('/account', 'HomeController@account')->name('associate.account');
	
});
