<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web','auth']], function () {
    Route::get('/settings/profile', ['as' => 'user.profile','uses' =>'UserController@profileAction']);
    Route::put('/settings/profile', ['as' => 'user.profile','uses' =>'UserController@updateProfileAction']);
    Route::get('/settings/password', ['as' => 'user.password','uses' =>'UserController@passwordAction']);
    Route::put('/settings/password', ['as' => 'user.password','uses' =>'UserController@updatePasswordAction']);
});

Route::group(['as' => 'admin.','namespace' => 'Admin','prefix' => 'admin','middleware' => ['web','admin']], function () {
    Route::get('', ['as' => 'index','uses' =>'AdminController@indexAction']);
    Route::get('users', ['as' => 'user','uses' =>'AdminController@userAction']);
    Route::group(['as' => 'user.','prefix' => 'user'], function(){
        Route::get('{id}/profile', ['as' => 'profile', 'uses' => 'AdminController@profileAction']);
        Route::get('{id}/profile', ['as' => 'profile', 'uses' => 'AdminController@profileAction']);
        Route::put('{id}/profile', ['as' => 'profile', 'uses' => 'AdminController@updateProfileAction']);
        Route::get('{id}/password', ['as' => 'password', 'uses' => 'AdminController@passwordAction']);
        Route::put('{id}/password', ['as' => 'password', 'uses' => 'AdminController@updatePasswordAction']);
        Route::get('{id}/password', ['as' => 'role', 'uses' => 'AdminController@roleAction']);
        Route::put('{id}/password', ['as' => 'role', 'uses' => 'AdminController@updateRoleAction']);
    });
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', ['as' => 'home','uses' =>'HomeController@index']);

});

Route::get('/type/{id}', ['as' => 'showProductsByType','uses' =>'ProductController@showProductsByType']);

Route::get('/product/{id}', ['as' => 'showProductDetails','uses' =>'ProductController@showProductDetails']);