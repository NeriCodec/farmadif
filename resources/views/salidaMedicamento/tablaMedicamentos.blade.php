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
            <th>{{ $medicamento->fecha_caducidad }}</th>
            <th>{{ $medicamento->cantidad }}</th>
            <th>{{ $medicamento->solucion_tableta }}</th>
            <th>{{ $medicamento->tipo_contenido }}</th>
            <th>
                <form action="{{ route('ruta_agregar_medicamento', ['idMedicamento' => $medicamento->id_medicamento, 'idBeneficiario' => $beneficiario->id_beneficiario]) }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-7">
                            <input type="number" class="form-control pull-left" placeholder="Cant." name="cantidad" min="1" max="{{ $medicamento->cantidad }}"  required >
                        </div>
                        <div class="col-md-2">
                            @if($medicamento->cantidad == 0)
                            <button class="btn btn-primary btn-small btn-agregar pull-rigth" disabled="disabled">
                            @else
                            <button class="btn btn-primary btn-small btn-agregar pull-rigth">
                            @endif
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </form>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>