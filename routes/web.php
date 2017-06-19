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

    //
    // LOGIN
    //

    Route::post('/signup',[
        'uses' => 'UserController@postSignUp',
            'as' => 'signup'
        ]);

    Route::post('/signin',[
        'uses' => 'UserController@postSignIn',
        'as' => 'signin'
    ]);

     Route::get('/auth/{provider}', [
        'uses' => 'Auth\RegisterController@redirectToProvider',
        'as' => 'provider.auth'
    ]);

    Route::get('/auth/{provider}/callback', [
        'uses'=> 'Auth\RegisterController@handleProviderCallback',
        'as' => 'provider.callback'
    ]);

    Route::get('/logout',[
        'uses' => 'UserController@getLogout',
        'as' => 'logout'
    ]);

    //
    //  END OF LOGIN
    //

    //
    //  MAIN PAGES
    //

    Route::get('/',[
        'uses' => 'UserController@getHome',
        'as' => 'baseRoute',
        'middleware' => 'auth'
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

    //
    // END OF MAIN PAGES
    //

    Route::post('/updateaccount',[
        'uses' => 'UserController@postSaveAccount',
        'as' => 'account.save'
    ]);

    Route::get('userimage/{userId}/{username}',[
        'uses' => 'UserController@getUserImage',
        'as' => 'account.image'
    ]);

    //
    // UPLOAD
    //

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

    //
    // end of content upload routes
    //

    // get view part coresponding to content_type

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
        'uses' => 'UserController@postSimpleSearchResults',
        'as' => 'simple.search',
        'middleware' => 'auth'
    ]);

    /*
     * DELETE USER MEMORIES
     */

    Route::post('delete/photo',[
        'uses'=> 'UserController@postDeleteUserPhoto',
        'as' => 'delete.photo',
        'middleware' => 'auth'
    ]);

    Route::post('delete/video',[
        'uses'=> 'UserController@postDeleteUserVideo',
        'as' => 'delete.video',
        'middleware' => 'auth'
    ]);

    Route::post('delete/document',[
        'uses'=> 'UserController@postDeleteUserDocument',
        'as' => 'delete.document',
        'middleware' => 'auth'
    ]);

    Route::post('delete/letter',[
        'uses'=> 'UserController@postDeleteUserLetter',
        'as' => 'delete.letter',
        'middleware' => 'auth'
    ]);

    Route::post('delete/artefact',[
        'uses'=> 'UserController@postDeleteUserArtefact',
        'as' => 'delete.artefact',
        'middleware' => 'auth'
    ]);

    /*
     * END OF DELETE USER MEMORIES
     */

    /*
     * FRIENDSHIP ROUTES
     */

    Route::post('friend/request/send',[
        'uses'=> 'UserController@postSendFriendRequest',
        'as' => 'friend.send',
        'middleware' => 'auth'
    ]);

    Route::post('friend/request/accept',[
        'uses'=> 'UserController@postAcceptFriendRequest',
        'as' => 'friend.accept',
        'middleware' => 'auth'
    ]);

    Route::post('friend/request/deny',[
        'uses'=> 'UserController@postDenyFriendRequest',
        'as' => 'friend.deny',
        'middleware' => 'auth'
    ]);

    Route::post('friend/remove',[
        'uses'=> 'UserController@postRemoveFriend',
        'as' => 'friend.remove',
        'middleware' => 'auth'
    ]);

    /*
     * END OF FRIENDSHIP ROUTES
     */

    Route::get('getHomeContent',[
        'uses'=> 'UserController@getAllHomeContent',
        'as' => 'get.content',
        'middleware' => 'auth'
    ]);

});

