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

Route::get('/datos', function () {
    $datos  = DB::select('SELECT * FROM tb_salida_medicamento
							INNER JOIN tb_medicamentos
							ON tb_salida_medicamento.tb_medicamentos_id_medicamento = tb_medicamentos.id_medicamento
							WHERE tb_salida_verificacion_id_salida_verificacion = 33');
    return $datos;
});



# Rutas para el beneficiario
Route::name('ruta_beneficiarios')->get('/beneficiarios', 'BeneficiarioController@mostrarBeneficiarios');
Route::name('ruta_beneficiario_registro')->get('/beneficiario/registro', 'BeneficiarioController@mostrarRegistro');
Route::name('ruta_beneficiario_registrar')->post('/beneficiario/registrar', 'BeneficiarioController@registrar');

# Rutas para el Donadores
Route::name('ruta_donadores')->get('/donadores', 'DonadorController@mostrarDonadores');
Route::name('ruta_donador_registro')->get('/donador/registro', 'DonadorController@mostrarRegistro');
Route::name('ruta_donador_registrar')->post('/donador/registrar', 'DonadorController@registrar');

# Rutas para la salida de medicamento
Route::name('ruta_salida_medicamentos')->get('/salida-medicamentos', 'SalidaMedicamentoController@mostrarBeneficiarios');
Route::name('ruta_salida_medicamento')->get('/salida-medicamento/{id}', 'SalidaMedicamentoController@mostrarVerificarSalidaDeMedicamento');
Route::name('ruta_verificar_medicamento')->post('/salida-medicamento/{id}', 'SalidaMedicamentoController@verificarSalidaDeMedicamento');
Route::name('ruta_agregar_medicamento')->post('/salida-medicamento/agregar/{idMedicamento}/beneficiario/{idBeneficiario}', 'SalidaMedicamentoController@agregarMedicamento');
Route::name('ruta_eliminar_medicamento')->post('/salida-medicamento/eliminar/{idMedicamento}/beneficiario/{idBeneficiario}/salida/{idSalidaMedicamento}', 'SalidaMedicamentoController@eliminarMedicamento');
#Rutas para la entrada de medicaento -esta es la parte pendiente
Route::name('ruta_entrada_medicamentos')->get('/entrada-medicamentos','EntradaMedicamentoController@index');
# Rutas del medicamento
Route::name('ruta_medicamentos')->get('/medicamentos', 'MedicamentoController@mostrarMedicamentos');

# Rutas para la autenticacion
Auth::routes();

Route::get('/home', 'HomeController@index');
