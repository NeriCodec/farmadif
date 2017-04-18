$(document).ready(function(){
    $('#tgeneral').DataTable({
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
            {data: 'tipo_contenido'},
        ],
        "language": {
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
        }
    });
});