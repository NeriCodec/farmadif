<?php

# Ruta para la autenticacion
Route::get('/', function () {
    return view('/home');
})->middleware('auth');

# Rutas para el beneficiario
Route::name('ruta_beneficiarios')->get('/beneficiarios', 'BeneficiarioController@mostrarBeneficiarios');
Route::name('ruta_beneficiario_registro')->get('/beneficiario/registro', 'BeneficiarioController@mostrarRegistro');
Route::name('ruta_beneficiario_registrar')->post('/beneficiario/registrar', 'BeneficiarioController@registrar');
Route::name('ruta_detalle_beneficiario')->get('/beneficiarios/detalles/{idBeneficiario}', 'BeneficiarioController@mostrarDetalle');
Route::name('ruta_medicamento_requerido_detalle')->get('/medicamento-requerido/detalles/{idBeneficiario}', 'BeneficiarioController@mostrarDetalleMedicamentoRequerido');
# Rutas para los WS 
Route::resource('/usuarios/login', 'LoginWSController', ['only'=>['store']] );
Route::resource('/usuarios/medicamento', 'MedicamentoWSController', ['only'=>['index', 'store']] );
Route::resource('/usuarios/notificacion', 'NotificacionesWSController', ['only'=>['store']] );
Route::resource('/usuarios/medicamento-requeridos', 'MedicamentoRequeridoWsController', ['only'=>['index']] );


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
Route::name('ruta_guardar_medicamento_entrada_nuevo')->get('/guardar/{idMedicamento}','EntradaMedicamentoController@gurdarNuevoMedicamento');
Route::name('ruta_buscar_medicamento_seleccionar')->get('/buscar/{idDonador}','EntradaMedicamentoController@buscarMedicamentoSeleccionar');
Route::name('ruta_nuevo_registrar_medicamento')->get('/nuevo/{idDonador}','EntradaMedicamentoController@nuevoMedicamentoRegistrar');
Route::name('ruta_nuevo_existente_registrar_medicamento')->get('/nuevo/donador/{idDonador}/medicamento/{idMedicamento}','EntradaMedicamentoController@nuevoExistenteMedicamentoRegistrar');
# Rutas del medicamento
Route::name('ruta_medicamentos')->get('/medicamentos', 'MedicamentoController@mostrarMedicamentos');
Route::name('ruta_medicamentos_inventario')->get('/medicamentos/inventario', 'MedicamentoController@mostrarInventarioMedicamentos');
#rutas para inventarios
Route::name('ruta_mostrar_medicamentos_totales')->get('medicamento/totales','MedicamentosTotalesController@mostrarMedicementosTotales');
Route::name('ruta_mostrar_medicementos_vencidos')->get('medicamento/vencido','MedicamentosVencidosController@mostrarMedicementosVencidos');
Route::name('ruta_mostrar_medicamentos_requerido')->get('medicamento/requrido','MedicamentoRequeridoController@mostrarMedicementosRequeridos');
Route::name('ruta_mostrar_medicamentos_salida')->get('medicamento/salida','MedicamentoSalidaController@mostrarMedicementosSalidas');
Route::name('ruta_mostrar_medicamentos_entrada')->get('medicamento/entrada','MedicamentoEntradaController@mostrarMedicementosEntrada');
Route::name('ruta_mostrar_medicamentos_prox_vencer')->get('medicamento/proximos/vencer','MedicamentosProximoVencerController@mostrarMedicementosProxVencidos');


# Rutas de solicitudes
Route::name('ruta_solicitudes')->get('/solicitudes', 'SolicitudPendienteController@mostrarSolicitudes');
Route::name('ruta_solicitud_salida')->get('solicitud/salida/{idSolicitud}/{idMedicamento}/{idBeneficiario}/{idMedicamentoRequerido}', 'SolicitudPendienteController@salidaDeMedicamentoRequerido');

#Rutas de imprecion de Reportes

Route::name('ruta_imprimir_inventario_pdf')->get('/imprimir/inventario','ReporteInventarioPDFController@imprimirReporte');
Route::name('ruta_imprimir_inventario_vencidos_pdf')->get('/imprimir/vencidos','MedicamentosVencidosController@imprimirReporte');
Route::name('ruta_imprimir_inventario_prox_vencer_pdf')->get('/imprimir/proxvencidos','MedicamentosProximoVencerController@imprimirReporte');
Route::name('ruta_imprimir_inventario_requerido_pdf')->get('/imprimir/requeridos','MedicamentoRequeridoController@imprimirReporte');
Route::name('ruta_imprimir_inventario_entrada_pdf')->get('/imprimir/entrada','MedicamentoEntradaController@imprimirReporte');
Route::name('ruta_imprimir_inventario_salida_pdf')->get('/imprimir/salida','MedicamentoSalidaController@imprimirReporte');

#Rutas para la parte de donadores
Route::name('ruta_seleccionar_donador_donador')->get('/seleccionar/{idDonador}','DonadorController@obtieneMedicamentosDonados');

#Rutas para realizar modificaciones 
Route::name('ruta_guardar_donador_actualizar')->post('/donador/actualizar','DonadorController@guardaActualizarDonador');
Route::name('ruta_eliminar_donador')->get('/eliminar-donador/{idDonador}','DonadorController@eliminarDonador');
Route::name('ruta_seleccionar_actualizar_donador')->get('/actializar-donador/{idDonador}','DonadorController@actualizarDonador');
#beneficiario modifi
Route::name('ruta_eliminar_beneficiario')->get('/eliminar-beneficiario/{idBeneficiario}','BeneficiarioController@eliminarBeneficiario');
Route::name('ruta_seleccionar_actualizar_beneficiario')->get('/actializar-beneficiario/{idBeneficiario}','BeneficiarioController@actualizarBeneficiario');
Route::name('ruta_guardar_beneficiario_actualizar')->post('/beneficiario/actualizar','BeneficiarioController@guardaActualizarBeneficiario');



# Rutas para la autenticacion
Auth::routes();
Route::get('/home', 'HomeController@index');
