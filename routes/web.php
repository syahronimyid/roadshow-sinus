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

Route::view('alamat','test.index');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::resource('/angkatan', 'AngkatanController');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/mahasiswa', 'MahasiswaController@index');
    Route::get('/mahasiswa/create', 'MahasiswaController@create');
    Route::post('/mahasiswa/save', 'MahasiswaController@store');
    Route::get('/mahasiswa/{id}/edit', 'MahasiswaController@edit');
    Route::PATCH('/mahasiswa/{id}/', 'MahasiswaController@update');
    Route::DELETE('/mahasiswa/{id}/', 'MahasiswaController@destroy');

});