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

Auth::routes(['verify' => true]);

Route::get('/', function () { return view('home'); })->name('index'); //Index publico 
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


Route::get('/dashboard', 'CandidatoFrontController@dashboard')->name('dashboard')->middleware('candidato');

Route::get('/dashboard/profile', 'CandidatoFrontController@profile')->name('dashboard.profile')->middleware('candidato');
Route::patch('/dashboard/profile/update', 'CandidatoFrontController@profileUpdate')->name('dashboard.profile.update')->middleware('candidato');

Route::get('/dashboard/files', 'CandidatoFrontController@files')->name('dashboard.files')->middleware('candidato');
Route::get('/dashboard/postulations', 'CandidatoFrontController@postulations')->name('dashboard.postulations')->middleware('candidato');



//Rutas para el back (Solo administrador)
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

//Rutas de servicios
Route::get('/img/{key}','MediaController@getImage'); //Imagenes