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
	$('select#ine_ife').on('change',function(){
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

	$('.btn-agregar').click(function(evento) {
		evento.preventDefault();
		var row  = $(this).parents('tr');
		var id   = row.data('id');
		var form = $('#form-agregar');
		var url  = form.attr('action').replace(':BENEFICIARIO_ID', id);
		var data = form.serialize();

		$.post(url, data, function(resultado){
			alert(resultado.mensaje);
		});

	})

	function datos_verificados() {
		$('#datos-verificados').append("<center><h4><p><strong> Receta medica:</strong> "+ receta_medica +
										 " <strong> + Solicitud:</strong> " + solicitud +
										 " <strong> + Ine/Ife:</strong> " + ine_ife +
										 " <strong> + Fotografia:</strong> " + fotografia +
										 " <strong> + Descripcion apoyo:</strong> " + $('#descripcion_apoyo').val() + 
										 " <strong> + Diagnostico:</strong> " + $('#diagnostico').val() + "</p></h4></center>");
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
