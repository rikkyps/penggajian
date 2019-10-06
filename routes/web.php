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
    return view('welcome');
});

Route::get('test-templates', function () {
    return view('karyawan.index');
});

Route::resource('/departments', 'DepartmentController');
Route::resource('/positions', 'PositionController');

//Datatables Routes
Route::get('/api/datatable/departments', 'DepartmentController@dataTable')->name('api.datatable.departments');