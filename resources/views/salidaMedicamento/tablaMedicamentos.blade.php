@if(count($medicamentos) <= 0)
<div class="row">
    <div class="col-lg-12">
        <center><h4>Buscar medicamento </h4><span class="glyphicon glyphicon-search" aria-hidden="true"></span></center>

    </div>
</div>
@else
 <table width="100%" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Nombre comercial</th>
            <th>Nombre compuesto</th>
            <th>No. etiqueta</th>
            <th>No. folio</th>
            <th>Fecha caducidad</th>
            <th>Solucion/Tableta</th>
            <th>Contenido</th>
            <th>Agregar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($medicamentos as $medicamento)
        <tr>
            <th>{{ $medicamento->nombre_comercial }}</th>
            <th>{{ $medicamento->nombre_compuesto }}</th>
            <th>{{ $medicamento->num_etiqueta }}</th>
            <th>{{ $medicamento->num_folio }}</th>
            
            @if($medicamento->mes_caducidad <= 9)
                <th>{{ "0" . $medicamento->mes_caducidad . " / " . $medicamento->anio_caducidad}}</th>
            @else
                <th>{{ $medicamento->mes_caducidad . " / " . $medicamento->anio_caducidad}}</th>
            @endif

            <th>{{ $medicamento->solucion_tableta }}</th>
            <th>{{ $medicamento->dosis . ' ' .$medicamento->tipo_contenido }}</th>
            <th>
                <form action="{{ route('ruta_agregar_medicamento', ['idMedicamento' => $medicamento->id_medicamento, 'idBeneficiario' => $beneficiario->id_beneficiario]) }}" method="post">
                    {{ csrf_field() }}
                    <center>
                        <button class="btn btn-info" type="submit">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                    </center>
                </form>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
@endif