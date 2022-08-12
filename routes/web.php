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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'backend'], function(){
    Route::get('/login', 'Backend\BackendController@Login')->name('backend.login');
    Route::post('/login-post', 'Backend\BackendController@LoginPost')->name('backend.login.post');

    Route::get('/logout', 'Backend\BackendController@Logout')->name('backend.logout');

    Route::get('/register', 'Backend\BackendController@Register')->name('backend.register');
    Route::post('/register-post', 'Backend\BackendController@RegisterPost')->name('backend.register.post');

    Route::get('/dashboard', 'Backend\BackendController@Dashboard')->name('backend.dashboard')->middleware('backend_auth');

    Route::group(['prefix'=>'user'], function(){
        Route::get('/', 'Backend\UserController@index')->name('user.index')->middleware('backend_auth');
        Route::get('/create', 'Backend\UserController@create')->name('user.create')->middleware('backend_auth');
        Route::post('/store', 'Backend\UserController@store')->name('user.store')->middleware('backend_auth');
        Route::get('/edit/{id}', 'Backend\UserController@show')->name('user.edit')->middleware('backend_auth');
        Route::post('/update', 'Backend\UserController@update')->name('user.update')->middleware('backend_auth');
        Route::get('/delete/{id}', 'Backend\UserController@destroy')->name('user.delete')->middleware('backend_auth');
    });

    Route::group(['prefix'=>'profile'], function(){
        Route::get('/{id}', 'Backend\UserController@edit_profile')->name('profile.edit_profile')->middleware('backend_auth');
        Route::post('/update', 'Backend\UserController@update_profile')->name('profile.update_profile')->middleware('backend_auth');
    });
});

Route::get('/testing_template', function(){
    return view('layouts.backend');
});