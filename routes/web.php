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
    return view('auth.login');
});

// Route::get('/login', function () {
//     return view('login');
// });

# Rutas para el beneficiario
Route::name('ruta_beneficiarios')->get('/beneficiarios', 'BeneficiarioController@index');
Route::name('ruta_beneficiario_registro')->get('/beneficiario/registro', 'BeneficiarioController@registro');
Route::name('ruta_beneficiario_registrar')->post('/beneficiario/registrar', 'BeneficiarioController@registrar');

# Rutas para la salida de medicamento
Route::name('ruta_salida_medicamentos')->get('/salida-medicamentos', 'SalidaMedicamentoController@index');
Route::name('ruta_salida_medicamento')->get('/salida-medicamento/{id}', 'SalidaMedicamentoController@salida');
# Ruta de donador
//Route::name('ruta_login')->get('/login','LoginController@autenticacion');
Auth::routes();

Route::get('/home', 'HomeController@index');
