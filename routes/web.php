<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', 'DataNasabahController@index')->name('home');
Route::get('/getRole', 'Auth\RegisterController@getDataRole')->name('role');

//role controller
Route::get('/karyawan', function () {
    return view('role_layouts.karyawan');
});
Route::get('/direktur', function () {
    return view('role_layouts.direktur');
});
Route::get('/supervisor', function () {
    return view('role_layouts.supervisor');
});
Route::post('utama/store', 'UtamaController@store')->name('storeFile');

//route export excel
Route::get('/nasabah', 'DataNasabahController@index')->name('nasabah');
Route::get('/nasabah/export_excel', 'DataNasabahController@export_excel')->name('nasabahExport');
Route::post('/nasabah/import_excel', 'DataNasabahController@import_excel')->name('nasabahImport');
Route::get('/nasabah/{id}/edit', 'DataNasabahController@edit')->name('edit');
Route::put('/nasabah/{id}', 'DataNasabahController@update')->name('update');
Route::get('/nasabah/create', 'DataNasabahController@create')->name('create');
Route::post('/nasabah/store', 'DataNasabahController@store')->name('store');
Route::get('/nasabah/delete/{id}', 'DataNasabahController@delete')->name('delete');
