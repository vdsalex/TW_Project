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

View::addExtension('html','php');

Route::get('/', function () {
    return view('pages/home');
});

Route::get('/profile', function () {
    return view('pages/profile');
});

Route::get('/my_memories',function(){
   return view('pages/my_memories');
});
Route::get('/search', function () {
   return view('pages/advanced_search');
});

Route::get('/login', function () {
   return view('pages/login');
});

Route::get('/upload', function () {
    return view('pages/upload');
});

Route::get('/welcome', function () {
    return view('welcome');
});

