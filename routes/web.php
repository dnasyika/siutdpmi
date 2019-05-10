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
    return redirect('landing');
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

//Landing Page
Route::get('/home', 'HomeController@index')->name('home');
Route::get('landing', 'landingController@index');

//Beranda
Route::get('beranda', 'berandaController@index');

//Stok Darah
Route::resource('stok', 'stokController');
Route::post('/updateStok', ['as' => 'updateStok', 'uses' => 'stokController@update']);

//Permintaan
Route::resource('permintaan', 'permintaanController');
Route::get('/validasiPermintaan/{id}', ['as' => 'validasiPermintaan', 'uses' => 'permintaanController@validasi']);
Route::get('/batalkanPermintaan/{id}', ['as' => 'batalkanPermintaan', 'uses' => 'permintaanController@batalvalidasi']);

//Pendonor
Route::resource('pendonor', 'pendonorController');
Route::post('/updatePendonor', ['as' => 'updatePendonor', 'uses' => 'pendonorController@update']);
Route::get('/hapusPendonor/{id}', ['as' => 'hapusPendonor', 'uses' => 'pendonorController@destroy']);

//Donor
Route::resource('donor', 'donorController');
Route::post('/updateDonor', ['as' => 'updateDonor', 'uses' => 'donorController@update']);
Route::get('/hapusDonor/{id}', ['as' => 'hapusDonor', 'uses' => 'donorController@destroy']);

//Peramalan
Route::resource('peramalan', 'peramalanController');