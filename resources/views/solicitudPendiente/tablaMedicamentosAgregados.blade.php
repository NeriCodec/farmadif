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
            <th>Nombre comercial</th>
            <th>Nombre compuesto</th>
            <th>No. etiqueta</th>
            <th>No. folio</th>
            <th>Fecha caducidad</th>
            <th>Solucion/Tableta</th>
            <th>Contenido</th>
            {{-- <th>Eliminar</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach($medicamentosAgregados as $medicamento)
        <tr>
            <td>{{ $medicamento->nombre_comercial }}</td>
            <td>{{ $medicamento->nombre_compuesto }}</td>
            <td>{{ $medicamento->num_etiqueta }}</td>
            <td>{{ $medicamento->num_folio }}</td>
            
            @if($medicamento->mes_caducidad <= 9)
                <td>{{ "0" . $medicamento->mes_caducidad . " / " . $medicamento->anio_caducidad}}</td>
            @else
                <td>{{ $medicamento->mes_caducidad . " / " . $medicamento->anio_caducidad}}</td>
            @endif
            
            <td>{{ $medicamento->solucion_tableta }}</td>
            <td>{{ $medicamento->dosis . ' ' . $medicamento->tipo_contenido }}</td>
            <td>
                {{-- <center>
                    <form action="{{ route('ruta_eliminar_medicamento', ['idMedicamento' => $medicamento->id_medicamento, 'idBeneficiario' => $beneficiario->id_beneficiario, 'idSalidaMedicamento' => $medicamento->id_salida_medicamento, 'cantidad' => $medicamento->cantidad_medicamento]) }}" method="post" id="form-agregar">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button class="btn btn-danger btn-small btn-agregar">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </button>
                    </form>
                </center> --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif