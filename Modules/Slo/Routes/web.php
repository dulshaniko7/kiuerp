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

Route::prefix('slo')->group(function() {
    Route::get('/', 'SloController@index');
});
Route::get('/slo/batch','BatchController@index')->name('batch');

Route::get('/slo/studentRegister','StudentController@index')->name('register');
Route::get('/slo/idRange','IDRangeController@index')->name('idRange');
Route::get('/slo/attendance','AttendenceController@index')->name('attendance');
Route::get('/slo/transfers','BatchController@index')->name('transfers');
