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

   

    var tseleccionarDonador = $('#tseleccionarDonador').DataTable({
        "processing": true,     
        "lengthMenu": [[5], ['Todos']],
        "ajax": {
            "url": "http://localhost:8000/api/donadores",
            "type": "POST",
            "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        },
        "columns": [
            {data: 'id_donador'},
            {data: 'nombre'},
            {data: 'domicilio'},
            {data: 'num_telefonico'},
            {data: 'codigo_postal'},
            {
                "orderable":      false,
                "data":           null,
                "defaultContent": '<center><button class="btn btn-success btn-small"></button></center>'
            }
        ],
        "language": es,
    });



   
});