@if(count($medicamentosAgregados) <= 0)
<div class="row">
    <div class="col-lg-12">
        <br><br><br>
        <center><h4>No hay medicamentos agregados</h4></center>
        <br><br><br>
    </div>
</div>
@else
<table class="table table-striped table-bordered table-hover" >
    <thead>
        <tr>
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
        <tr>
            <th>{{ $medicamento->nombre_comercial }}</th>
            <th>{{ $medicamento->nombre_compuesto }}</th>
            <th>{{ $medicamento->num_etiqueta }}</th>
            <th>{{ $medicamento->num_folio }}</th>
            <th>{{ $medicamento->fecha_caducidad }}</th>
            <th>{{ $medicamento->cantidad_medicamento }}</th>
            <th>{{ $medicamento->solucion_tableta }}</th>
            <th>{{ $medicamento->tipo_contenido }}</th>
            <th>
                <center>
                    <form action="{{ route('ruta_eliminar_medicamento', ['idMedicamento' => $medicamento->id_medicamento, 'idBeneficiario' => $beneficiario->id_beneficiario, 'idSalidaMedicamento' => $medicamento->id_salida_medicamento, 'cantidad' => $medicamento->cantidad_medicamento]) }}" method="post" id="form-agregar">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button class="btn btn-danger btn-small btn-agregar">
                            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                        </button>
                    </form>
                </center>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
@endif