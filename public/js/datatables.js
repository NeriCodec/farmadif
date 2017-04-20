$(document).ready(function(){
    var aMedicamento = [];
    
    var es = {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    };

    var tmedicamento = $('#tmedicamento').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "http://localhost:8000/api/medicamentos",
        "columns": [
            {data: 'nombre_comercial'},
            {data: 'nombre_compuesto'},
            {data: 'num_etiqueta'},
            {data: 'num_folio'},
            {data: 'fecha_caducidad'},
            {data: 'cantidad'},
            {data: 'solucion_tableta'},
            {data: 'tipo_contenido'}
        ],
        "language": es,
    });

    var tagregarmedicamento = $('#tagregarmedicamento').DataTable({
        "processing": true,
        "lengthMenu": [[5], ['Todos']],
        "ajax": "http://localhost:8000/api/medicamentos",
        "columns": [
            {data: 'id_medicamento'},
            {data: 'nombre_comercial'},
            {data: 'nombre_compuesto'},
            {data: 'num_etiqueta'},
            {data: 'num_folio'},
            {data: 'fecha_caducidad'},
            {data: 'cantidad'},
            {data: 'solucion_tableta'},
            {data: 'tipo_contenido'},
            {
                "orderable":      false,
                "data":           null,
                "defaultContent": '<center><button class="btn btn-success btn-small"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button></center>'
            }
        ],
        "language": es,
    });

    $('#tagregarmedicamento tbody').on('click', 'button', function () {
        var datos = tagregarmedicamento.row( $(this).parents('tr') ).data();
        var form = $('#form-agregar');
        var url = form.attr('action').replace(':MEDICAMENTO_ID', datos.id_medicamento);
        var data = form.serialize();
        
        $.post(url, data, function (respuesta) {
            if(respuesta!='agotado') {
                agregarMedicamento(datos);
            } else {
                alert(datos.nombre_comercial + " " + respuesta);
            }
        });

        tagregarmedicamento.ajax.reload();
    } );

    function agregarMedicamento(datos) {
        var table = document.getElementById("tbTodosLosMedicamentos");
        var row = table.insertRow(0);
        var cell0 = row.insertCell(0);
        var cell1 = row.insertCell(1);
        var cell2 = row.insertCell(2);
        var cell3 = row.insertCell(3);
        var cell4 = row.insertCell(4);
        var cell5 = row.insertCell(5);
        var cell6 = row.insertCell(6);
        var cell7 = row.insertCell(7);
        var cell8 = row.insertCell(8);
        cell0.innerHTML = datos.id_medicamento;
        cell1.innerHTML = datos.nombre_comercial;
        cell2.innerHTML = datos.nombre_compuesto;
        cell3.innerHTML = datos.num_etiqueta;
        cell4.innerHTML = datos.num_folio;
        cell5.innerHTML = datos.fecha_caducidad;
        cell6.innerHTML = 1;
        cell7.innerHTML = datos.solucion_tableta;
        cell8.innerHTML = datos.tipo_contenido;
    }

    var tbeneficiarios = $('#tbeneficiarios').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "http://localhost:8000/api/beneficiarios",
        "columns": [
            {data: 'nombre'},
            {data: 'domicilio'},
            {data: 'comunidad'},
            {data: 'fecha_nacimiento'},
            {data: 'fecha_registro'},
        ],
        "language": es,
    });
});