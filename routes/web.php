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

    Route::resource('barang', 'BarangController');
    Route::resource('bahan', 'BahanController');
    Route::resource('returpenjualan', 'ReturPenjualanController');
    Route::post('/prosesret', 'ProsesReturController@proses')->name('prosesret');
    Route::get('/spb', 'ReturPenjualanController@spb')->name('spb');
    Route::resource('spbproduksi', 'SpbProduksiController');
});

Route::group(['prefix' => 'ppic', 'middleware' => ['auth', 'role:ppic']], function() {

    Route::get('/', function () {
        return view('ppic.indux');
    });
    Route::put('/prosesret/process/{id}', 'ProsesReturController@prosesacc')->name('prosesretacc');
    Route::put('/prosesret/decline/{id}', 'ProsesReturController@prosesdec')->name('prosesretdec');
    Route::put('/prosesret/data/{id}', 'ProsesReturController@data')->name('data');
    Route::get('/spk', 'ProsesReturController@spk')->name('spk');
    Route::resource('prosesretur', 'ProsesReturController');
    Route::resource('spkproduksi', 'SpkProduksiController');
});

Route::group(['prefix' => 'produksi', 'middleware' => ['auth', 'role:produksi']], function() {

    Route::get('/', function () {
        return view('produksis.index');
    });
    Route::get('/spbspk', 'SpbSpkController@all')->name('spbspk');
});


Route::get('/', function () {

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



