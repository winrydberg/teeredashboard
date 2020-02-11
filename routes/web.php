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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login','Admin\AuthController@login');
Route::get('/dashboard','Admin\AdminController@dashboard');
Route::get('/new-admin','Admin\AdminController@newAdmin');
Route::post('/new-admin','Admin\AdminController@saveAdmin');
Route::get('/admins', 'Admin\AdminController@admins');
Route::get('/new-applications','Admin\AdminController@newapplications');
Route::get('/approved-applicants', 'Admin\AdminController@approvedApllications');
Route::get('/get-passsword', 'Admin\AdminController@getPassword');



