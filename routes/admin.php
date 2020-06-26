<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'DashboardController@index')->name('dashboard.index');
Route::resource('posts', 'PostController');
