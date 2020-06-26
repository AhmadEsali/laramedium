<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'DashboardController@index')->name('dashboard.index')->middleware('auth');
Route::resource('posts', 'PostController');
