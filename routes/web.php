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
    return view('/home');
})->middleware('auth');

# Rutas para el beneficiario
Route::name('ruta_beneficiarios')->get('/beneficiarios', 'BeneficiarioController@index');
Route::name('ruta_beneficiario_registro')->get('/beneficiario/registro', 'BeneficiarioController@registro');
Route::name('ruta_beneficiario_registrar')->post('/beneficiario/registrar', 'BeneficiarioController@registrar');

# Rutas para el Donadores
Route::name('ruta_donadores')->get('/donadores', 'DonadorController@index');
Route::name('ruta_donador_registro')->get('/donador/registro', 'DonadorController@registro');
Route::name('ruta_donador_registrar')->post('/donador/registrar', 'DonadorController@registrar');

# Rutas para la salida de medicamento
Route::name('ruta_salida_medicamentos')->get('/salida-medicamentos', 'SalidaMedicamentoController@index');
Route::name('ruta_salida_medicamento')->get('/salida-medicamento/{id}', 'SalidaMedicamentoController@salida');

Auth::routes();

Route::get('/home', 'HomeController@index');
