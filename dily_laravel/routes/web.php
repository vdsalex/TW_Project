<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=> ['web']],function(){


    Route::post('/signup',[
        'uses' => 'UserController@postSignUp',
            'as' => 'signup'
        ]);

    Route::post('/signin',[
        'uses' => 'UserController@postSignIn',
        'as' => 'signin'
    ]);


    Route::get('/home',[
        'uses' => 'UserController@getHome',
        'as' => 'home',
        'middleware' => 'auth'
    ]);

    Route::get('/profile',[
        'uses' => 'UserController@getProfile',
        'as' => 'profile',
        'middleware' => 'auth'
    ]);

    Route::get('/memories',[
        'uses' => 'UserController@getMyMemories',
        'as' => 'memories',
        'middleware' => 'auth'
    ]);

    Route::get('/search',[
        'uses' => 'UserController@getAdvancedSearch',
        'as' => 'search',
        'middleware' => 'auth'
    ]);

    Route::get('/login',[
        'uses' => 'UserController@getLogin',
        'as' => 'login',
    ]);

    Route::get('/upload',[
        'uses' => 'UserController@getUpload',
        'as' => 'upload',
        'middleware' => 'auth'
    ]);

    Route::get('/',[
        'uses' => 'UserController@getHome',
        'as' => 'baseRoute',
        'middleware' => 'auth'
    ]);

    Route::get('/logout',[
       'uses' => 'UserController@getLogout',
        'as' => 'logout'
    ]);

    Route::post('/updateaccount',[
        'uses' => 'UserController@postSaveAccount',
        'as' => 'account.save'
    ]);
});

