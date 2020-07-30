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

Route::prefix('slo')->group(function () {
    Route::get('/', 'SloController@index');
});

Route::get('/slo/batchTypes', 'BatchTypeController@index')->name('batchType.index');
Route::get('/slo/batchType', 'BatchTypeController@create')->name('batchType.create');
Route::post('/slo/batchType', 'BatchTypeController@store')->name('batchType.store');
Route::get('/slo/batchType/{id}', 'BatchTypeController@show')->name('batchType.show');
Route::get('/slo/batchType/{id}/edit', 'BatchTypeController@edit')->name('batchType.edit');
Route::put('/slo/batchType/{id}', 'BatchTypeController@update')->name('batchType.update');


Route::get('/slo/batches', 'BatchController@index')->name('batch.index');
Route::get('/slo/batch', 'BatchController@create')->name('batch.create');
Route::post('/slo/batch', 'BatchController@store')->name('batch.store');
Route::get('/slo/batch/{id}/edit', 'BatchController@edit')->name('batch.edit');


Route::get('/slo/studentRegisters', 'StudentController@index')->name('registers');
Route::get('/slo/idRanges', 'IDRangeController@index')->name('idRanges');
Route::get('/slo/attendances', 'AttendenceController@index')->name('attendances');
Route::get('/slo/transfers', 'BatchController@index')->name('transfers');




