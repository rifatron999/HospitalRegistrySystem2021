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
//system user
	//hospital
	Route::get('/hospital','HospitalController@index')->middleware('role:system_user')->name('admin.hospital');
	Route::post('/hospital','HospitalController@store')->middleware('role:system_user')->name('admin.hospital.store');
	Route::get('/hospitalDelete/{id}','HospitalController@destroy')->middleware('role:system_user')->name('admin.hospital.destroy');
	Route::get('/hospitalEditView/{id}','HospitalController@edit')->middleware('role:system_user')->name('admin.hospital.edit');
	Route::post('/hospitalUpdate/{id}','HospitalController@update')->middleware('role:system_user')->name('admin.hospital.update');
	//treatment
	Route::get('/treatment','TreatmentController@index')->middleware('role:system_user')->name('admin.treatment');
	Route::post('/treatment','TreatmentController@store')->middleware('role:system_user')->name('admin.treatment.store');
	Route::get('/treatmentDelete/{id}','TreatmentController@destroy')->middleware('role:system_user')->name('admin.treatment.destroy');
	Route::get('/treatmentEditView/{id}','TreatmentController@edit')->middleware('role:system_user')->name('admin.treatment.edit');
	Route::post('/treatmentUpdate/{id}','TreatmentController@update')->middleware('role:system_user')->name('admin.treatment.update');
	//disease
	Route::get('/disease','diseaseController@index')->middleware('role:system_user')->name('admin.disease');
	Route::post('/disease','diseaseController@store')->middleware('role:system_user')->name('admin.disease.store');
	Route::get('/diseaseDelete/{id}','diseaseController@destroy')->middleware('role:system_user')->name('admin.disease.destroy');
	Route::get('/diseaseEditView/{id}','diseaseController@edit')->middleware('role:system_user')->name('admin.disease.edit');
	Route::post('/diseaseUpdate/{id}','diseaseController@update')->middleware('role:system_user')->name('admin.disease.update');

});
