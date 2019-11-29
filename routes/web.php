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

Route::get('/', 'HomeController@index')->name('index'); //Index publico 
Route::get('/home', 'HomeController@home')->name('home')->middleware('verified');
	

	//Dashboard
	Route::get('/dashboard', 'CandidatoFrontController@dashboard')->name('dashboard')->middleware('candidato');

	//Mi perfil
	Route::get('/dashboard/profile', 'CandidatoFrontController@profile')->name('dashboard.profile')->middleware('candidato');
	Route::patch('/dashboard/profile/update', 'CandidatoFrontController@profileUpdate')->name('dashboard.profile.update')->middleware('candidato');

	//Mis referencias/archivos
	Route::get('/dashboard/files', 'CandidatoFrontController@files')->name('dashboard.files')->middleware('candidato');
	Route::get('/dashboard/files/{archivo}', 'CandidatoFrontController@downloadFile')->name('dashboard.files.download')->middleware('candidato');
	Route::delete('/dashboard/files/{archivo}', 'CandidatoFrontController@destroyFile')->name('dashboard.files.destroy')->middleware('candidato');
	Route::post('/dashboard/files', 'CandidatoFrontController@storeFile')->name('dashboard.files.store')->middleware('candidato');

	//Postulaciones
	Route::get('/dashboard/postulations', 'CandidatoFrontController@postulations')->name('dashboard.postulations')->middleware('candidato');
	Route::get('/dashboard/postulations/{vacante}', 'CandidatoFrontController@storePostulation')->name('dashboard.postulations.store')->middleware('candidato');
	Route::delete('/dashboard/postulations/{vacante}', 'CandidatoFrontController@destroyPostulation')->name('dashboard.postulations.destroy')->middleware('candidato');

	//Catologo de vacantes
	Route::get('/vacantes','VacanteFrontController@index')->name('front.vacante.index');
	Route::get('/vacantes/{vacante}','VacanteFrontController@show')->name('front.vacante.show');
	Route::post('/vacantes','HomeController@busqueda')->name('busqueda');


//Rutas para el back (Solo administrador)
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
	Route::get('/', function() { return view('admin.home'); })->name('admin');

	Route::resource('categoria','CategoriaController', ['parameters' => ['categoria' => 'categoria']]);
	Route::get('asignacion/{categoria}/{vacante}','AsignacionController@store')->name('asignacion.store');
	Route::delete('asignacion/{categoria}/{vacante}','AsignacionController@destroy')->name('asignacion.destroy');


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