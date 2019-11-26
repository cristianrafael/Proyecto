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



//Rutas para el front
Route::get('/', function () { return view('home'); })->name('index');

Route::get('/img/{key}','MediaController@getImage');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

//Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard')->middleware('verified');



//Rutas para el back
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {

	Route::get('/', function() { return view('admin.home'); })->name('admin');

	Route::resource('candidato','CandidatoController');
	Route::resource('candidato.archivos','ArchivoController')->except('edit','update','show');

	
	Route::get('/download/{archivo}','ArchivoController@download')->name('download');


	
	Route::delete('postulacion/{candidato}/{vacante}','PostulacionController@destroy')->name('postulacion.destroy');
	Route::get('postulacion/{candidato}/{vacante}','PostulacionController@store')->name('postulacion.store');


	Route::resource('vacante','VacanteController');
		Route::get('vacante/{vacante}/postulaciones');
});