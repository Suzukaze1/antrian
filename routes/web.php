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


//pasien
Route::get('/', 'AntrianLoketController@index');
Route::get('/antrian_loket/tipe', 'AntrianLoketController@tipe');
Route::get('/antrian_loket/tipe/pasienlama', 'AntrianLoketController@antrianlama');
Route::get('/antrian_loket/tipe/pasienlama/umum', 'AntrianLoketController@antrianlamaumum');
Route::get('/antrian_loket/tipe/pasienlama/bpjs', 'AntrianLoketController@antrianlamabpjs');

Route::get('/antrian_loket/tipe/pasienbaru', 'AntrianLoketController@antrianbaru');
Route::get('/antrian_loket/tipe/pasienbaru/umum', 'AntrianLoketController@antrianlamaumum');
Route::get('/antrian_loket/tipe/pasienbaru/bpjs', 'AntrianLoketController@antrianlamabpjs');

Route::get('/antrian_loket/tipe/antrian', 'AntrianLoketController@antrian');

Route::get('/antrian_loket/antrian/umum', 'AntrianLoketController@umum');

//store data
Route::post('/antrian_loket/antrian/umum/store-umum', 'AntrianLoketController@store_umum');
Route::post('/antrian_loket/tipe/pasienlama/bpjs/store-bpjs', 'AntrianLoketController@store_bpjs');

Route::get('/antrian-pasien-umum-baru', 'AntrianLoketController@umum_baru');
Route::get('/antrian-pasien-bpjs-baru', 'AntrianLoketController@bpjs_baru');

//admin
Route::get('/admin', 'AdminController@index')->middleware('CekLogin');
Route::get('/admin/loket', 'AdminController@loket')->middleware('CekLogin');
Route::get('/admin/pegawai', 'AdminController@pegawai')->middleware('CekLogin');
Route::get('/admin/loket/{loket}', 'AdminController@loketpilih')->middleware('CekLogin');

//login
Route::get('/login', 'LoginController@index');
Route::post('/loginpost', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

//api
Route::get('/api/getAntrian/{loket}', 'AdminController@getAntrian');
Route::get('/api/panggil/{loket}', 'AdminController@panggil');