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

Route::get('/', 'FrontendController@index');

Route::get('post/{post}', 'FrontendController@showPost')->name('post.show');
Route::get('tag/{tag}', 'FrontendController@showTag')->name('tag.show');

Auth::routes();
