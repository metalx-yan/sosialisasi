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

    Route::resource('barang', 'ItemController');

    Route::resource('kategori', 'CategoryController');

    Route::resource('purchase', 'PurchaseController');
        
});

Route::group(['prefix' => 'purchasing', 'middleware' => ['auth', 'role:purchasing']], function() {
    Route::get('/', function () {

        return view('purchasing.indux');
    });

    Route::resource('request', 'RequestController');
    Route::get('/invoice-pdf', 'RequestController@pdf')->name('pdf');

    // Route::resource('barang', 'ItemController');
    
});

Route::group(['prefix' => 'manager', 'middleware' => ['auth', 'role:manager']], function() {
    Route::get('/', function () {

        return view('manager.index');
    });

    Route::get('/permintaan', 'RequestController@acc')->name('manager.acc');
    Route::put('permintaan/{id}', 'RequestController@accpost')->name('manager.barang.post');
    Route::put('permintaan/decline/{id}', 'RequestController@accpostdecline')->name('manager.barang.post.decline');
    // Route::get('permintaan', 'ItemController@acc')->name('manager.barang');
    
});


Route::get('/', function () {

    return view('welcome', compact('schema', 'records'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



