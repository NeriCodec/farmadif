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
    return view('templates.panel');
});

Route::get('/login', function () {
    return view('login');
});

Route::name('ruta_beneficiarios')->get('/beneficiarios', 'BeneficiarioController@index');
Route::name('ruta_beneficiario_registro')->get('/beneficiario/registro', 'BeneficiarioController@registro');
Route::name('ruta_beneficiario_registrar')->post('/beneficiario/registrar', 'BeneficiarioController@registrar');
