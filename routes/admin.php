<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::middleware(['guest:admin'])->namespace('Admin')->group(function (){

	Route::get('login', 'AccountController@showLoginForm')->name('admin.login');
	Route::post('login', 'AccountController@login')->name('admin.login.submit');

});

Route::get('logout', 'Admin\AccountController@logout')->name('admin.logout');

Route::middleware(['auth:admin'])->namespace('Admin')->group(function (){
	
	Route::get('/', 'HomeController@index')->name('admin.index');
	Route::get('/account', 'HomeController@account')->name('admin.account');

});
