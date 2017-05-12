@if(count($medicamentos) <= 0)
<div class="row">
    <div class="col-lg-12">
        <br><br><br>
        <center>
        <h4>No se encontro el medicamento</h4>
        {{-- <button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button> --}}
        </center>
        <br><br><br>
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
            <th>Cantidad</th>
            <th>Solucion/Tableta</th>
            <th>Contenido</th>
            <th>Agregar Cantidad</th>
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

            <th>{{ $medicamento->cantidad }}</th>
            <th>{{ $medicamento->solucion_tableta }}</th>
            <th>{{ $medicamento->tipo_contenido }}</th>
            <th>
                <form action="{{ route('ruta_agregar_medicamento', ['idMedicamento' => $medicamento->id_medicamento, 'idBeneficiario' => $beneficiario->id_beneficiario]) }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="input-group">
                              <input type="number" class="form-control" required name="cantidad" min="1" max="{{ $medicamento->cantidad }}" placeholder="Cant.">
                              <span class="input-group-btn">
                              @if($medicamento->cantidad == 0)
                                <button class="btn btn-info" type="submit"  disabled="disabled"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                @else
                                <button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                @endif
                              </span>
                            </div>
                        </div>
                    </div>
                </form>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
@endif