<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/antrian_loket', 'AntrianLoketController@index');
Route::get('/antrian_loket/tipe', 'AntrianLoketController@tipe');
Route::get('/antrian_loket/tipe/pasienlama', 'AntrianLoketController@antrianlama');
Route::get('/antrian_loket/tipe/pasienlama/umum', 'AntrianLoketController@antrianlamaumum');
Route::get('/antrian_loket/tipe/pasienlama/bpjs', 'AntrianLoketController@antrianlamabpjs');

Route::get('/antrian_loket/tipe/pasienbaru', 'AntrianLoketController@antrianbaru');
Route::get('/antrian_loket/tipe/pasienbaru/umum', 'AntrianLoketController@antrianlamaumum');
Route::get('/antrian_loket/tipe/pasienbaru/bpjs', 'AntrianLoketController@antrianlamabpjs');

Route::get('/antrian_loket/tipe/antrian', 'AntrianLoketController@antrian');

Route::get('/antrian_loket/antrian/umum', 'AntrianLoketController@umum');
Route::post('/antrian_loket/antrian/umum/store-umum', 'AntrianLoketController@store_umum');

Route::get('/antrian-pasien-umum-baru', 'AntrianLoketController@umum_baru');
Route::get('/antrian-pasien-bpjs-baru', 'AntrianLoketController@bpjs_baru');
