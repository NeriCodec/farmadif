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
Route::name('ruta_beneficiario_registro')->get('/beneficiario/registro', 'BeneficiarioController@mostrarRegistro');
Route::name('ruta_beneficiario_registrar')->post('/beneficiario/registrar', 'BeneficiarioController@registrar');

# Rutas para el Donadores
Route::name('ruta_donadores')->get('/donadores', 'DonadorController@index');
Route::name('ruta_donador_registro')->get('/donador/registro', 'DonadorController@mostrarRegistro');
Route::name('ruta_donador_registrar')->post('/donador/registrar', 'DonadorController@registrar');

# Rutas para la salida de medicamento
Route::name('ruta_salida_medicamentos')->get('/salida-medicamentos', 'SalidaMedicamentoController@mostrarBeneficiarios');
Route::name('ruta_salida_medicamento')->get('/salida-medicamento/{id}', 'SalidaMedicamentoController@salida');
Route::name('ruta_agregar_medicamento')->post('/salida-medicamento/agregar/{id}/beneficiario/{idb}', 'SalidaMedicamentoController@agregar');
Route::name('ruta_eliminar_medicamento')->post('/salida-medicamento/eliminar/{id}/beneficiario/{idb}', 'SalidaMedicamentoController@eliminar');
#Rutas para la entrada de medicaento -esta es la parte pendiente
Route::name('ruta_entrada_medicamentos')->get('/entrada-medicamentos','EntradaMedicamentoController@index');
# Rutas del medicamento
Route::name('ruta_medicamentos')->get('/medicamentos', 'MedicamentoController@mostrarMedicamentos');
# Ruta para la API de DataTables
Route::get('api/medicamentos', 'MedicamentoController@obtenerTodosLosMedicamentos');
Route::get('api/beneficiarios', 'BeneficiarioController@obtenerTodosLosBeneficiarios');
Route::get('api/donadores', 'DonadorController@obtenerTodosLosDonadores');

Auth::routes();

Route::get('/home', 'HomeController@index');
