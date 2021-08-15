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

   Route::resource('kecamatan', 'KecamatanController');
   Route::resource('kelurahan', 'KelurahanController');
   Route::resource('pengemis', 'PengemisController');
   Route::resource('pemulung', 'PemulungController');
   Route::resource('migran', 'MigranController');
   Route::resource('binaan', 'BinaanController');
   Route::resource('kekerasan', 'KekerasanController');
   Route::resource('terlantar', 'TerlantarController');
   Route::resource('psikologis', 'PsikologisController');
   Route::resource('napza', 'NapzaController');
});

Route::group(['prefix' => 'ppic', 'middleware' => ['auth', 'role:ppic']], function() {

    Route::get('/', function () {
        return view('ppic.indux');
    });

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



