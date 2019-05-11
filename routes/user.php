<?php

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register user routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "user" middleware group. Now create something great!
|
*/

Route::middleware(['guest:user'])->namespace('Auth')->group(function (){
	// Social login route
	Route::get('login/{provider}', 'SocialAccountController@redirectToProvider');
	Route::get('login/{provider}/callback', 'SocialAccountController@handleProviderCallback');
	
});

Route::middleware(['guest:user'])->namespace('User')->group(function (){
	// Custom login route
	Route::get('login', 'AccountController@showLoginForm')->name('user.login');
	Route::post('login', 'AccountController@login')->name('user.login.submit');

	Route::get('/create', 'AccountController@create')->name('user.create');
	Route::post('/store', 'AccountController@store')->name('user.store');
	
});

Route::get('logout', 'User\AccountController@logout')->name('user.logout');

Route::middleware(['auth:user'])->namespace('User')->group(function (){
	
	Route::get('/', 'HomeController@index')->name('user.index');
	Route::get('/account', 'HomeController@account')->name('user.account');

});
