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

// Route settings user
Route::group(['as' => 'user.' ,'middleware' => ['web','auth']], function () {
    Route::get('/settings/profile', ['as' => 'profile','uses' =>'UserController@profileAction']);
    Route::put('/settings/profile', ['as' => 'profile','uses' =>'UserController@updateProfileAction']);
    Route::get('/settings/password', ['as' => 'password','uses' =>'UserController@passwordAction']);
    Route::put('/settings/password', ['as' => 'password','uses' =>'UserController@updatePasswordAction']);

    Route::get('/cart',['as'=>'cart' , 'uses' =>'CartController@showAction']);
    Route::get('/cart/add/{id}',['as'=>'cart.add' , 'uses' =>'CartController@addAction']);
    Route::get('/cart/del/{id}',['as'=>'cart.del' , 'uses' =>'CartController@delAction']);
});

// Route Administration
Route::group(['as' => 'admin.','namespace' => 'Admin','prefix' => 'admin','middleware' => ['web','admin']], function () {
    Route::get('', ['as' => 'index','uses' =>'AdminController@indexAction']);
    Route::get('users', ['as' => 'user','uses' =>'AdminController@userAction']);
    Route::get('products', ['as' => 'product','uses' =>'AdminController@productAction']);
    Route::group(['as' => 'user.','prefix' => 'user'], function(){
        Route::get('{id}/del', ['as' => 'del', 'uses' => 'AdminController@deleteAction']);
        Route::get('{id}/profile', ['as' => 'profile', 'uses' => 'AdminController@profileAction']);
        Route::put('{id}/profile', ['as' => 'profile', 'uses' => 'AdminController@updateProfileAction']);
        Route::get('{id}/password', ['as' => 'password', 'uses' => 'AdminController@passwordAction']);
        Route::put('{id}/password', ['as' => 'password', 'uses' => 'AdminController@updatePasswordAction']);
        Route::get('{id}/role', ['as' => 'role', 'uses' => 'AdminController@roleAction']);
        Route::put('{id}/role', ['as' => 'role', 'uses' => 'AdminController@updateRoleAction']);
        Route::put('add', ['as' => 'add', 'uses' => 'AdminController@updateRoleAction']);
    });
    Route::group(['as' => 'product.','prefix' => 'product'], function(){
        Route::get('{id}/del', ['as' => 'del', 'uses' => 'AdminController@deleteAction']);
        Route::get('add', ['as' => 'add', 'uses' => 'AdminController@profileAction']);
        Route::post('add', ['as' => 'add', 'uses' => 'AdminController@updateProfileAction']);
        Route::get('{id}/update', ['as' => 'update', 'uses' => 'AdminController@passwordAction']);
        Route::put('{id}/update', ['as' => '', 'uses' => 'AdminController@updatePasswordAction']);
    });
});

// Route Racine
Route::group(['middleware' => 'web'], function () {
    Route::auth();



    Route::get('/', ['as' => 'home','uses' =>'HomeController@index']);
    Route::get('/type/{id}', ['as' => 'showProductsByType','uses' =>'ProductController@showProductsByType']);
    Route::get('/product/{id}', ['as' => 'showProductDetails','uses' =>'ProductController@showProductDetails']);

});

