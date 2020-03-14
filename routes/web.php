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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/home', 'PagesController@home');

Route::resource('members','MembersController');
Route::resource('books','PostsController');
Route::get('/search','PostsController@search');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::get('/memberdashboard', 'MemberDashController@index');
