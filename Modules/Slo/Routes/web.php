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
Route::get('/slo/batchTypeDelete/{id}', 'BatchTypeController@softDelete')->name('batchType.delete');

Route::get('/slo/batches', 'BatchController@index')->name('batch.index');
Route::get('/slo/batch', 'BatchController@create')->name('batch.create');
Route::post('/slo/batch', 'BatchController@store')->name('batch.store');
Route::get('/slo/batch/{id}/edit', 'BatchController@edit')->name('batch.edit');
Route::put('/slo/batch/{id}', 'BatchController@update')->name('batch.update');
Route::get('/slo/batch/{id}', 'BatchController@show')->name('batch.show');
Route::get('/slo/batchDelete/{id}', 'BatchController@softDelete')->name('batch.delete');


Route::get('/slo/idRanges', 'IDRangeController@index')->name('idRange.index');
Route::get('/slo/idRange', 'IDRangeController@create')->name('idRange.create');
Route::post('/slo/idRange', 'IDRangeController@store')->name('idRange.store');
Route::get('/slo/idRange/{id}/edit', 'IDRangeController@edit')->name('idRange.edit');
Route::get('/slo/idRange/{id}', 'IDRangeController@show')->name('idRange.show');
Route::put('/slo/idRange/{id}', 'IDRangeController@update')->name('idRange.update');
Route::get('/slo/idRangeDelete/{id}', 'IDRangeController@softDelete')->name('idRange.delete');

Route::get('/slo/idRange/start/{id}', 'IDRangeController@start')->name('idRange.start');
Route::get('/slo/idRange/search/{id}', 'IDRangeController@search')->name('idRange.search');

//course req controller
Route::get('/slo/courseReqs', 'CourseRequirementController@index')->name('courseReq.index');
Route::get('/slo/courseReq', 'CourseRequirementController@create')->name('courseReq.create');
Route::get('/slo/courseReq/{id}/edit', 'CourseRequirementController@edit')->name('courseReq.edit');
Route::get('/slo/courseReq/search/{id}', 'CourseRequirementController@search')->name('courseReq.search');
Route::post('/slo/courseReq', 'CourseRequirementController@store')->name('courseReq.store');
Route::put('/slo/courseReq/{id}', 'CourseRequirementController@update')->name('courseReq.update');

Route::get('/slo/studentRegisters', 'StudentController@index')->name('register.index');
Route::get('/slo/studentRegister', 'StudentController@create')->name('register.create');
Route::post('/slo/studentRegister', 'StudentController@store')->name('register.store');
Route::get('/slo/studentRegister/{id}/edit', 'StudentController@edit')->name('register.edit');
//Route::post('/slo/studentRegister', 'StudentController@store')->name('register.store');


//ajax routes
Route::get('/slo/getDepartments/{id}', 'StudentController@getDeps')->name('departments.get');
Route::get('/slo/getCourses/{id}', 'FetchController@getCourse')->name('course.get');
Route::get('/slo/getBatches/{id}', 'FetchController@getBatch')->name('batch.get');
Route::get('/slo/getBatchType/{id}', 'FetchController@getBatchType')->name('batchType.get');
Route::get('/slo/getDepartment/{id}', 'FetchController@getDep')->name('department.get');
Route::get('/slo/getStudentId', 'FetchController@getStdId')->name('studentId.get');
Route::get('/slo/getIdRange/{id}', 'FetchController@getIdRange')->name('idRange.get');
Route::get('/slo/getIdStart/{id}', 'FetchController@getCgsid')->name('idRange1.get');
Route::get('/slo/getStudentCount/{id}', 'FetchController@courseStudentCount');
Route::get('/slo/group/{id}', 'FetchController@courseGroup');
Route::get('/slo/repeatId', 'FetchController@repeatId');
Route::get('/slo/repeatGenId', 'FetchController@repeatGenId');
Route::get('/slo/getCourseRequirements/{id}', 'FetchController@getCourseRequirements');

Route::get('/slo/attendances', 'AttendenceController@index')->name('attendances');
Route::get('/slo/transfers', 'BatchController@index')->name('transfers');




