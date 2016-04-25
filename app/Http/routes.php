<?php

// Legendaries app
Route::group(['middleware' => ['web'], 'domain' => env('APP_DOMAIN'), 'as' => 'app::'], function () {

    // Authentication Routes...
    Route::get('login', 'Auth\AuthController@showLoginForm')->name('login');
    Route::post('login', 'Auth\AuthController@login');
    Route::get('logout', 'Auth\AuthController@logout')->name('logout');
    // Registration Routes...
    Route::get('register', 'Auth\AuthController@showRegistrationForm');
    Route::post('register', 'Auth\AuthController@register');
    // Password Reset Routes...
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');

    Route::get('/', ['as' => 'dashboard', function () {
        return view('app');
    }]);

    // Modal routes
    Route::get('/modal/{view}', 'ModalController@show')->name('modal');
});

// Legendaries API
Route::group(['domain' => 'api.' . env('APP_DOMAIN'), 'as' => 'api::', 'namespace' => 'Api'], function () {
    Route::group(['middleware' => ['api.app'], 'as' => 'app::'], function () {
        Route::get('/user', 'UserController@index');
        Route::get('/user/instances', 'UserController@instances');
        Route::post('/user/instance', 'UserController@newInstance')->name('newInstance');
        Route::get('/user/collections', 'UserController@collections');
    });

    Route::group(['middleware' => ['api']], function () {
        Route::get('/', function () {
            echo 'Hello, world.';
        });
        Route::resource('users', 'UserController');
    });
});
