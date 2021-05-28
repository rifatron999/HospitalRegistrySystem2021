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


 Route::group([
    'prefix'     => config('multiauth.prefix', 'admin'),

], function () {
	Route::get('/hospital','HospitalController@index')->middleware('role:system_user')->name('admin.hospital');
	Route::post('/hospital','HospitalController@store')->middleware('role:system_user')->name('admin.hospital.store');
});
