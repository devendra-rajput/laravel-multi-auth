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

// Auth::routes();

// Route::middleware('guest')->group(function(){
// 	Route::get('login', 'Auth\LoginController@jobSeekerLoginForm')->name('jobSeeker.login');
// 	Route::post('login', 'Auth\LoginController@jobSeekerLogin');
// });

// Route::get('logout', 'Auth\LoginController@logout');
// Route::middleware(['auth:jobSeeker','guest:jobSeeker'])->group(function(){
// 	Route::get('/', 'HomeController@index')->name('jobSeeker.index');
// });

Route::get('login', 'JobSeeker\AccountController@showLoginForm')->name('jobSeeker.login');
Route::post('login', 'JobSeeker\AccountController@login')->name('jobSeeker.login.submit');
Route::get('/', 'JobSeeker\HomeController@index')->name('jobSeeker.index');