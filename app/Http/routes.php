<?php

// Legendaries app
Route::group(['middleware' => ['web'], 'domain' => env('APP_DOMAIN'), 'as' => 'app::'], function () {

    Route::get('login', 'Auth\AuthController@redirectToProvider')->name('login');
    Route::get('login/callback', 'Auth\AuthController@handleProviderCallback');

    // used for adding a bot to the server
    //Route::get('login/bot', 'Auth\BotAuthController@redirectToProvider');
    //Route::get('login/bot/callback', 'Auth\BotAuthController@handleProviderCallback');

    Route::get('/', ['as' => 'dashboard', function () {
        return view('splash');
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
