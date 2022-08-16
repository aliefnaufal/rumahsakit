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

    Route::group(['prefix'=>'dokter'], function(){
        Route::get('/', 'Backend\DokterController@index')->name('dokter.index')->middleware('backend_auth');
        Route::get('/create', 'Backend\DokterController@create')->name('dokter.create')->middleware('backend_auth');
        Route::post('/store', 'Backend\DokterController@store')->name('dokter.store')->middleware('backend_auth');
        Route::get('/edit/{id}', 'Backend\DokterController@show')->name('dokter.edit')->middleware('backend_auth');
        Route::post('/update', 'Backend\DokterController@update')->name('dokter.update')->middleware('backend_auth');
        Route::get('/delete/{id}', 'Backend\DokterController@destroy')->name('dokter.delete')->middleware('backend_auth');
    });

    Route::group(['prefix'=>'pasien'], function(){
        Route::get('/', 'Backend\PasienController@index')->name('pasien.index')->middleware('backend_auth');
        Route::get('/create', 'Backend\PasienController@create')->name('pasien.create')->middleware('backend_auth');
        Route::post('/store', 'Backend\PasienController@store')->name('pasien.store')->middleware('backend_auth');
        Route::get('/edit/{id}', 'Backend\PasienController@show')->name('pasien.edit')->middleware('backend_auth');
        Route::post('/update', 'Backend\PasienController@update')->name('pasien.update')->middleware('backend_auth');
        Route::get('/delete/{id}', 'Backend\PasienController@destroy')->name('pasien.delete')->middleware('backend_auth');
    });

    Route::group(['prefix'=>'obat'], function(){
        Route::get('/', 'Backend\ObatController@index')->name('obat.index')->middleware('backend_auth');
        Route::get('/create', 'Backend\ObatController@create')->name('obat.create')->middleware('backend_auth');
        Route::post('/store', 'Backend\ObatController@store')->name('obat.store')->middleware('backend_auth');
        Route::get('/edit/{id}', 'Backend\ObatController@show')->name('obat.edit')->middleware('backend_auth');
        Route::post('/update', 'Backend\ObatController@update')->name('obat.update')->middleware('backend_auth');
        Route::get('/delete/{id}', 'Backend\ObatController@destroy')->name('obat.delete')->middleware('backend_auth');
    });

    Route::group(['prefix'=>'spesialis'], function(){
        Route::get('/', 'Backend\SpesialisController@index')->name('spesialis.index')->middleware('backend_auth');
        Route::get('/create', 'Backend\SpesialisController@create')->name('spesialis.create')->middleware('backend_auth');
        Route::post('/store', 'Backend\SpesialisController@store')->name('spesialis.store')->middleware('backend_auth');
        Route::get('/edit/{id}', 'Backend\SpesialisController@show')->name('spesialis.edit')->middleware('backend_auth');
        Route::post('/update', 'Backend\SpesialisController@update')->name('spesialis.update')->middleware('backend_auth');
        Route::get('/delete/{id}', 'Backend\SpesialisController@destroy')->name('spesialis.delete')->middleware('backend_auth');
    });
});

Route::get('/testing_template', function(){
    return view('layouts.backend_auth');
});

Route::get('/', function(){
    return redirect('/backend/login');
});