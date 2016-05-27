<?php

// Legendaries portal page & auth
Route::group(['middleware' => ['web'], 'domain' => env('APP_DOMAIN')], function () {

    Route::get('login', 'Auth\AuthController@redirectToProvider')->name('login');
    Route::get('login/callback', 'Auth\AuthController@handleProviderCallback');
    Route::get('logout', 'Auth\AuthController@logout')->name('logout');

    Route::get('/', ['as' => 'splash', function () {
        //var_dump(Auth::check()); die();
        return view('splash');
    }]);

});

// Legendaries app
Route::group(['middleware' => ['web','auth'], 'domain' => 'app.' . env('APP_DOMAIN'), 'as' => 'app::'], function () {

    Route::get('/', 'DashboardController@index')->name('dashboard');

});

// Legendaries API
Route::group(['middleware' => ['web','auth','api','cors'], 'domain' => 'api.' . env('APP_DOMAIN'), 'as' => 'api::', 'namespace' => 'Api'], function () {

    Route::get('guild/members/{id}', 'GuildController@member');
    Route::get('guild/members', 'GuildController@members');
    Route::resource('guild', 'GuildController', ['only' => ['index']]);

    Route::resource('users.heroes', 'UserHeroController', ['only' => ['index','store']], [
        'parameters' => 'singular'
    ]);

    Route::resource('heroes', 'HeroController', ['only' => ['index','show','update','destroy']]);

    Route::resource('users', 'UserController', ['only' => ['index','show']]);

    Route::resource('book', 'BookController', ['only' => ['index','show']]);

});
