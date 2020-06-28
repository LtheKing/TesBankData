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

Route::get('/home', 'HomeController@index')->name('home');
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
Route::get('/nasabah', 'DataNasabahController@index');
Route::get('/nasabah/export_excel', 'DataNasabahController@export_excel');
Route::post('/nasabah/import_excel', 'DataNasabahController@import_excel');
