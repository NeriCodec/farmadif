$(document).ready(function(){

	var receta_medica   = 'SI';
	var solicitud       = 'SI';
	var ine_ife         = 'NO';
	var fotografia      = 'NO';
	var id_verificacion = 0;

	// Verificacion de los valores select
	$('select#receta_medica').on('change',function(){
	    receta_medica = $(this).val();
	});

	// Verificacion de los valores select
	$('select#solicitud').on('change',function(){
	    solicitud = $(this).val();
	});

	// Verificacion de los valores select
	$('select#ife_ine').on('change',function(){
	    ine_ife = $(this).val();
	});

	// Verificacion de los valores select
	$('select#fotografia').on('change',function(){
	    fotografia = $(this).val();
	});

	$('#btn-verificar').click(function (evento) {
		evento.preventDefault();
		if(verificar_salida()) {
			visualizacionDatos();
			datos_verificados();
			salida_medicamento();
		}

	});

	function visualizacionDatos() {
		$('#salida-medicamentos').show();
		$('#datos-a-verificar').hide();
	}

	function salida_medicamento(argument) {
		
		//var row  = $(this).parents('tr');
		//var id   = row.data('id');
		var form = $('#form-verificar');
		var url  = form.attr('action');
		var data = form.serialize();
		//alert(form);
		$.post(url, data, function(resultado){
			id_verificacion = resultado.idverificacion;
			console.log(resultado.idverificacion);
		});
	}

	// $('.btn-agregar').click(function(evento) {
	// 	evento.preventDefault();
	// 	var row  = $(this).parents('tr');
	// 	var id   = row.data('id');
	// 	var form = $('#form-agregar');
	// 	var url  = form.attr('action').replace(':BENEFICIARIO_ID', id);
	// 	var data = form.serialize();

	// 	$.post(url, data, function(resultado){
	// 		if(resultado=='agotado') {
	// 			alert('agotado')
	// 		} else {
	// 			//for (var i = 0, len = resultado.medicamentos.length; i < len; i++) {
	// 			  console.log(resultado.medicamentos[0].cantidad);
	// 			  //var row  = $(this).parents('tr .tb-cantidad');
	// 			  row.append(resultado.medicamentos[0].cantidad);
	// 			//}
	// 			// forEach(var medicamento in resultado.medicamentos) {
	// 			// 	console.log(medicamento.cantidad);
	// 			// }
	// 		}
	// 	});

	// })

	$('.btn-eliminar').click(function(){ 
		console.log('eliminar');
	});

	function datos_verificados() {
		$('#datos-verificados').append("<table class='table table-striped table-bordered table-hover'><thead><tr>" +
										 " <th>Receta medica</th>" +
										 " <th>Solicitud</th>" +
										 " <th>IFE</th>" +
										 " <th>Fotografia</th>" +
										 " <th>Descripcion</th>" +
										 " <th>Diagnostico</th>" +
										 "</tr></thead>" +
										 " <tbody><tr><th>"+ receta_medica + "</th>" +
										 " <th>" + solicitud + "</th>" +
										 " <th>" + ine_ife + "</th>" +
										 " <th>" + fotografia + "</th>" +
										 " <th>" + $('#descripcion_apoyo').val() + "</th>" +
										 " <th>" + $('#diagnostico').val() + "</th></tr></tbody></table>");
	}

	function verificar_salida() {
		// Verifica que tenga la solicitud o la receta medica
		if (receta_medica == 'NO' || solicitud == 'NO') {
			alert('Debe tener receta medica y solicitud');
			return false;
		}

		// Verifica que tenga descripcion apoyo y el diagnostico
		if($('#descripcion_apoyo').val() == "" || $('#diagnostico').val() == "") {
			alert('Debe de tener una descripcion de apoyo y diagnostico');
			return false;
		}

		return true;
	}

	
});
