<?php

# Ruta para la autenticacion
Route::get('/', function () {
    return view('/home');
})->middleware('auth');

# Rutas para el beneficiario
Route::name('ruta_beneficiarios')->get('/beneficiarios', 'BeneficiarioController@mostrarBeneficiarios');
Route::name('ruta_beneficiario_registro')->get('/beneficiario/registro', 'BeneficiarioController@mostrarRegistro');
Route::name('ruta_beneficiario_registrar')->post('/beneficiario/registrar', 'BeneficiarioController@registrar');
Route::name('ruta_detalle_beneficiario')->get('/beneficiarios/detalles/{idBeneficiario}', 'BeneficiarioController@mostrarDetalleBeneficiario');

# Rutas para los WS 
Route::resource('/usuarios/login', 'LoginWSController', ['only'=>['store']] );
Route::resource('/usuarios/medicamento', 'MedicamentoWSController', ['only'=>['store']] );


# Rutas para el Donadores
Route::name('ruta_donadores')->get('/donadores', 'DonadorController@mostrarDonadores');
Route::name('ruta_donador_registro')->get('/donador/registro', 'DonadorController@mostrarRegistro');
Route::name('ruta_donador_registrar')->post('/donador/registrar', 'DonadorController@registrar');
Route::name('ruta_medicamentos_donados')->get('/donador/medicamentos-donados/{idDonador}', 'DonadorController@mostrarMedicamentosDonados');

# Rutas para la salida de medicamento
Route::name('ruta_salida_medicamentos')->get('/salida', 'SalidaMedicamentoController@mostrarBeneficiarios');
Route::name('ruta_salida_sin_medicamentos')->get('/salida-sin-medicamentos', 'SalidaMedicamentoController@eliminarVerificacion');
Route::name('ruta_salida_medicamento')->get('/salida/verificar/{idBeneficiario}', 'SalidaMedicamentoController@mostrarVerificarSalidaDeMedicamento');
Route::name('ruta_verificar_medicamento')->post('/salida/{idBeneficiario}', 'SalidaMedicamentoController@verificarSalidaDeMedicamento');
Route::name('ruta_salida_verificada_medicamentos')->get('/salida/{idBeneficiario}', 'SalidaMedicamentoController@mostrarSalidaDeMedicamento');
Route::name('ruta_agregar_medicamento')->post('/salida/agregar/{idMedicamento}/beneficiario/{idBeneficiario}','SalidaMedicamentoController@agregarMedicamento');
Route::name('ruta_eliminar_medicamento')->delete('/salida/eliminar/{idMedicamento}/beneficiario/{idBeneficiario}/salida/{idSalidaMedicamento}', 'SalidaMedicamentoController@eliminarMedicamento');

# Ruta para la salida de medicamento pendiente
Route::name('ruta_solicitud_pendiente')->get('/solicitud-pendiente/{idBeneficiario}', 'SolicitudPendienteController@mostrarSolicitud');
Route::name('ruta_solicitud_guardar_medicamento')->post('/solicitud-pendiente/agregar/{idBeneficiario}', 'SolicitudPendienteController@agregarMedicamento');
Route::name('ruta_eliminar_medicamento_requerido')->delete('solicitud-pendiente/eliminar/{idMedicamento}/{idMedicamentoRequerido}/{idBeneficiario}', 'SolicitudPendienteController@eliminarMedicamento');

#Rutas para la entrada de medicaento
Route::name('ruta_entrada_medicamentos')->get('/entrada-medicamentos','EntradaMedicamentoController@mostrarDonadores');
Route::name('ruta_seleccionar_donador_entrada')->get('/entrada-medicamentos/{idDonador}','EntradaMedicamentoController@selecionarDonador');
Route::name('ruta_guardar_medicamento_entrada_nuevo')->get('/guardar','EntradaMedicamentoController@gurdarNuevoMedicamento');
Route::name('ruta_buscar_medicamento_seleccionar')->get('/buscar/{idDonador}','EntradaMedicamentoController@buscarMedicamentoSeleccionar');
Route::name('ruta_nuevo_registrar_medicamento')->get('/nuevo/{idDonador}','EntradaMedicamentoController@nuevoMedicamentoRegistrar');
Route::name('ruta_nuevo_existente_registrar_medicamento')->get('/nuevo/donador/{idDonador}/medicamento/{idMedicamento}','EntradaMedicamentoController@nuevoExistenteMedicamentoRegistrar');
# Rutas del medicamento
Route::name('ruta_medicamentos')->get('/medicamentos', 'MedicamentoController@mostrarMedicamentos');
#rutas para inventarios
Route::name('ruta_mostrar_medicementos_vencidos')->get('medicamento/vencido','MedicamentosVencidosController@mostrarMedicementosVencidos');
Route::name('ruta_mostrar_medicamentos_requerido')->get('medicamento/requrido','MedicamentoRequeridoController@mostrarMedicementosRequeridos');
Route::name('ruta_mostrar_medicamentos_salida')->get('medicamento/salida','MedicamentoSalidaController@mostrarMedicementosSalidas');
Route::name('ruta_mostrar_medicamentos_entrada')->get('medicamento/entrada','MedicamentoEntradaController@mostrarMedicementosEntrada');
Route::name('ruta_mostrar_medicamentos_prox_vencer')->get('medicamento/proximos/vencer','MedicamentosProximoVencerController@mostrarMedicementosProxVencidos');



#Rutas de imprecion de Reportes

Route::name('ruta_imprimir_inventario_pdf')->get('/imprimir/inventario','ReporteInventarioPDFController@imprimirReporte');
Route::name('ruta_imprimir_inventario_vencidos_pdf')->get('/imprimir/vencidos','MedicamentosVencidosController@imprimirReporte');
Route::name('ruta_imprimir_inventario_prox_vencer_pdf')->get('/imprimir/proxvencidos','MedicamentosProximoVencerController@imprimirReporte');
Route::name('ruta_imprimir_inventario_requerido_pdf')->get('/imprimir/requeridos','MedicamentoRequeridoController@imprimirReporte');
Route::name('ruta_imprimir_inventario_entrada_pdf')->get('/imprimir/entrada','MedicamentoEntradaController@imprimirReporte');
Route::name('ruta_imprimir_inventario_salida_pdf')->get('/imprimir/salida','MedicamentoSalidaController@imprimirReporte');

#Rutas para la parte de donadores
Route::name('ruta_seleccionar_donador_donador')->get('/seleccionar/{idDonador}','DonadorController@obtieneMedicamentosDonados');


//pruebas para al utilizacion de ajax

//Route::name('ruta_opcion_entrada_medicamento')->get('/opciones/','EntradaMedicamentoController@')


// TODO: Revisar esto, porque no es la mejor forma de crear la API
Route::get('/api/medicamentos', function () {
   $medicamentos = App\Medicamento::medicamentosApi();
   return $medicamentos;
});

# Rutas para la autenticacion
Auth::routes();
Route::get('/home', 'HomeController@index');
