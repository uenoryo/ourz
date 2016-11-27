<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Home
Route::resource(
    '/',
    'HomeController',
    [
        'names' => [
            'index' => 'home.index',
        ],
        'only' => ['index'],
    ]
);

// User
Route::resource(
    'user',
    'UserController',
    [
        'only' => ['index'],
    ]
);

// Team作成(UserController)
Route::resource(
    'team',
    'UserController',
    [
        'only' => ['create', 'store'],
    ]
);
Route::group(
    [
        'as' => 'team',
    ],
    function () {
        Route::get('team/{name}', 'TeamController@index')->where('name', '^[0-9a-z-]+$');
    }
);

Auth::routes();
