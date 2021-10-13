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

    /*  Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
      Route::resource('content', 'ContentController')->except(['show']);
      Route::resource('center', 'CenterController')->except(['show']);
      Route::resource('social-link', 'SocialLinkController')->except(['show']);
      Route::resource('banner', 'BannerController')->except(['show']);
      Route::resource('team-member', 'TeamMemberController')->except(['show']);
      Route::resource('our-client', 'OurClientController')->except(['show']);
      Route::resource('service', 'ServiceController')->except(['show']);
      Route::resource('page', 'PageController')->except(['show']);*/

    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::post('service/ajax-file-upload', 'ServiceController@ajaxFileUpload');
    Route::resources([
        'content' => 'ContentController',
        'center' => 'CenterController',
        'social-link' => 'SocialLinkController',
        'banner' => 'BannerController',
        'team-member' => 'TeamMemberController',
        'our-client' => 'OurClientController',
        'service' => 'ServiceController',
        'page' => 'PageController',
    ], [
        'except' => ['show']
    ]);

    //Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
});
