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


Route::get('/', function () { return view('home'); })->name('index');

Auth::routes(['verify' => true]);


//Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard')->middleware('verified');
Route::resource('candidato','CandidatoController');


Route::get('/back', function() { return view('admin.dashboard'); })->name('dashboard');