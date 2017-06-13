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

    Route::get('/profile_settings',[
        'uses' => 'UserController@getProfileSettings',
        'as' => 'profile_settings',
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

    Route::get('/team_project',[
        'uses' => 'UserController@getTeamProject',
        'as' => 'team_project'
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

    Route::get('userimage/{filename}',[
        'uses' => 'UserController@getUserImage',
        'as' => 'account.image'
    ]);

    Route::get('/auth/{provider}', [
        'uses' => 'Auth\RegisterController@redirectToProvider',
        'as' => 'provider.auth'
    ]);

    Route::get('/auth/{provider}/callback', [
        'uses'=> 'Auth\RegisterController@handleProviderCallback',
        'as' => 'provider.callback'
    ]);

    Route::post('/upload/video',[
        'uses'=> 'UserController@postUploadVideo',
        'as' => 'upload.video'
    ]);

    Route::post('/upload/photo',[
        'uses'=> 'UserController@postUploadPhoto',
        'as' => 'upload.photo'
    ]);

    Route::post('/upload/artefact',[
        'uses'=> 'UserController@postUploadArtefact',
        'as' => 'upload.artefact'
    ]);

    Route::post('/upload/letter',[
        'uses'=> 'UserController@postUploadLetter',
        'as' => 'upload.letter'
    ]);

    Route::post('/upload/document',[
        'uses'=> 'UserController@postUploadDocument',
        'as' => 'upload.document'
    ]);

    Route::get('getContent/{content_type}',[
        'uses'=> 'UserController@getContent',
        'as' => 'get.content',
        'middleware' => 'auth'
    ]);


    Route::get('userphoto/{video_id}',[
        'uses' => 'UserController@getUserPhoto',
        'as' => 'user.photo',
        'middleware' => 'auth'
    ]);

    Route::get('uservideo/{video_id}',[
        'uses' => 'UserController@getUserVideo',
        'as' => 'user.video',
        'middleware' => 'auth'
    ]);

    Route::get('userdocument/{video_id}',[
        'uses' => 'UserController@getUserDocument',
        'as' => 'user.document',
        'middleware' => 'auth'
    ]);

    Route::get('userartefact/{video_id}',[
        'uses' => 'UserController@getUserArtefact',
        'as' => 'user.artefact',
        'middleware' => 'auth'
    ]);

    Route::get('userletter/{video_id}',[
        'uses' => 'UserController@getUserLetter',
        'as' => 'user.letter',
         'middleware' => 'auth'
    ]);

    Route::post('facebook_import',[
        'uses' => 'UserController@postImportPhoto',
        'as' => 'facebook.import',
        'middleware' => 'auth'
    ]);

    Route::post('search/results',[
        'uses' => 'UserController@getSimpleSearchResults',
        'as' => 'simple.search',
        'middleware' => 'auth'
    ]);

});

