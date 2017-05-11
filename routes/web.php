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
Route::name('ruta_beneficiarios')->get('/beneficiarios', 'BeneficiarioController@mostrarBeneficiarios');
Route::name('ruta_beneficiario_registro')->get('/beneficiario/registro', 'BeneficiarioController@mostrarRegistro');
Route::name('ruta_beneficiario_registrar')->post('/beneficiario/registrar', 'BeneficiarioController@registrar');

# Rutas para el Donadores
Route::name('ruta_donadores')->get('/donadores', 'DonadorController@mostrarDonadores');
Route::name('ruta_donador_registro')->get('/donador/registro', 'DonadorController@mostrarRegistro');
Route::name('ruta_donador_registrar')->post('/donador/registrar', 'DonadorController@registrar');

# Rutas para la salida de medicamento
Route::name('ruta_salida_medicamentos')->get('/salida', 'SalidaMedicamentoController@mostrarBeneficiarios');
Route::name('ruta_salida_medicamento')->get('/salida/verificar/{idBeneficiario}', 'SalidaMedicamentoController@mostrarVerificarSalidaDeMedicamento');
Route::name('ruta_verificar_medicamento')->post('/salida/{idBeneficiario}', 'SalidaMedicamentoController@verificarSalidaDeMedicamento');
Route::name('ruta_salida_verificada_medicamentos')->get('/salida/{idBeneficiario}', 'SalidaMedicamentoController@mostrarSalidaDeMedicamento');
Route::name('ruta_agregar_medicamento')->post('/salida/agregar/{idMedicamento}/beneficiario/{idBeneficiario}','SalidaMedicamentoController@agregarMedicamento');
Route::name('ruta_eliminar_medicamento')->delete('/salida/eliminar/{idMedicamento}/beneficiario/{idBeneficiario}/salida/{idSalidaMedicamento}/cantidad/{cantidad}', 'SalidaMedicamentoController@eliminarMedicamento');

#Rutas para la entrada de medicaento ->esta es la parte pendiente
Route::name('ruta_entrada_medicamentos')->get('/entrada-medicamentos','EntradaMedicamentoController@MostrarDonadores');
Route::name('ruta_seleccionar_donador')->get('/seleccionar/{idDonador}','EntradaMedicamentoController@SelecionarDonador');
Route::name('ruta_guardar_medicamento_entrada_nuevo')->get('/guardar/','EntradaMedicamentoController@GurdarNuevoMedicamento');
Route::name('ruta_buscar_medicamento_seleccionar')->get('/buscar/{idDonador}','EntradaMedicamentoController@BuscarMedicamentoSeleccionar');
Route::name('ruta_nuevo_registrar_medicamento')->get('/nuevo/{idDonador}','EntradaMedicamentoController@NuevoMedicamentoRegistrar');
Route::name('ruta_nuevo_existente_registrar_medicamento')->get('/nuevo/donador/{idDonador}/medicamento/{idMedicamento}','EntradaMedicamentoController@NuevoExistenteMedicamentoRegistrar');
//pruebas para al utilizacion de ajax

//Route::name('ruta_opcion_entrada_medicamento')->get('/opciones/','EntradaMedicamentoController@')

# Rutas del medicamento
Route::name('ruta_medicamentos')->get('/medicamentos', 'MedicamentoController@mostrarMedicamentos');
// TODO: Revisar esto, porque no es la mejor forma de crear la API
Route::get('/api/medicamentos', function () {
   $medicamentos = App\Medicamento::medicamentosApi();
   return $medicamentos;
});
// Route::get('/api/medicamentos', 'MedicamentoController@obtenerTodosLosMedicamentos');

# Rutas para la autenticacion
Auth::routes();
Route::get('/home', 'HomeController@index');
