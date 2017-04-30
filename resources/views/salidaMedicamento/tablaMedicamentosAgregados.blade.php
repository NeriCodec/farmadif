<table class="table table-striped table-bordered table-hover" >
    <thead>
        <tr>
            <td>ID</td>
            <td>Nombre comercial</td>
            <td>Nombre compuesto</td>
            <td>No. etiqueta</td>
            <td>No. folio</td>
            <td>Fecha caducidad</td>
            <td>Cantidad</td>
            <td>Solucion/Tableta</td>
            <td>Contenido</td>
            <td>Eliminar</td>
        </tr>
    </thead>
    <tbody>
        @foreach($medicamentosAgregados as $medicamento)
        <tr data-id="{{ $medicamento->id_medicamento }}" >
            <th>{{ $medicamento->id_medicamento }}</th>
            <th>{{ $medicamento->nombre_comercial }}</th>
            <th>{{ $medicamento->nombre_compuesto }}</th>
            <th>{{ $medicamento->num_etiqueta }}</th>
            <th>{{ $medicamento->num_folio }}</th>
            <th>{{ $medicamento->fecha_caducidad }}</th>
            <th>1</th>
            <th>{{ $medicamento->solucion_tableta }}</th>
            <th>{{ $medicamento->tipo_contenido }}</th>
            <th>
                <center>
                    <button class="btn btn-danger btn-small btn-eliminar">
                        Eliminar
                    </button>
                </center>
            </th>
        </tr>
        @endforeach
    </tbody>
    
</table>