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


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:administrator']], function() {

    Route::get('/', function () {

        return view('admin.index');
    });
        
});

Route::group(['prefix' => 'purchasing', 'middleware' => ['auth', 'role:purchasing']], function() {
    Route::get('/', function () {

        return view('purchasing.index');
    });
    
});

Route::group(['prefix' => 'manager', 'middleware' => ['auth', 'role:manager']], function() {
    Route::get('/', function () {

        return view('manager.index');
    });
    
});


Route::get('/', function () {

    return view('welcome', compact('schema', 'records'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
