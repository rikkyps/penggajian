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

Route::get('/settings', 'SettingController@index')->name('settings.index');
Route::post('/settings', 'SettingController@store')->name('settings.store');
Route::resource('/departments', 'DepartmentController');
Route::resource('/positions', 'PositionController');
Route::resource('/karyawans', 'KaryawanController');

//Datatables Routes
Route::get('/api/datatable/departments', 'DepartmentController@dataTable')->name('api.datatable.departments');
Route::get('/api/datatable/positions', 'PositionController@dataTable')->name('api.datatable.positions');
Route::get('api/datatable/karyawans', 'KaryawanController@dataTable')->name('api.datatable.karyawans');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
