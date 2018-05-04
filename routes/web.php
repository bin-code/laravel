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

Route::get('/', function () {
    return view('welcome');
});

Route::get('user/{id}', 'UserController@show')->middleware('token');
//Route::get('test', 'UserController@test');
//Route::get('token', 'UserController@token');

//Route::group(['middleware'=>['blog']],function(){
//    Route::get('/', function () {
//        return view('welcome', ['website' => 'Laravel']);
//    });
//
//    Route::view('/view', 'welcome', ['website' => 'Laravel学院']);
//});

Route::resource('posts','PostController');

Route::resource([
    'posts' => 'PostController',
    'photos' => 'PostController'
]);