<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');

Auth::routes();


/**
 * Admin Panel Routes
 */

Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'as' => 'admin.',
        'middleware' => 'auth',
    ], function () {

    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::resource('post', 'PostController')->except(['show']);
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');

});


