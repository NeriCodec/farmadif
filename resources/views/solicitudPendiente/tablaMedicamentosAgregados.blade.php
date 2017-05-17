@if(count($medicamentosRequeridos) <= 0)
<div class="row">
    <div class="col-lg-12">
        <br><br><br>
        <center><h4>No hay medicamentos agregados</h4></center>
        <br><br><br>
    </div>
</div>
@else
<div style="height:250px; overflow-y: scroll;">
    <table class="table table-striped table-bordered table-hover" >
        <thead>
            <tr>
                <th>Nombre comercial</th>
                <th>Nombre compuesto</th>
                <th>Solucion/Tableta</th>
                <th>Dosis</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicamentosRequeridos as $medicamento)
            <tr>
                <td>{{ $medicamento->nombre_comercial }}</td>
                <td>{{ $medicamento->nombre_compuesto }}</td> 
                <td>{{ $medicamento->solucion_tableta }}</td>
                <td>{{ $medicamento->dosis . ' ' . $medicamento->tipo_contenido }}</td>
                 <td>
                    <center>
                        <form action="{{ route('ruta_eliminar_medicamento_requerido', ['idMedicamento' => $medicamento->id_medicamento, 'idMedicamentoRequerido' => $medicamento->id_medicamentos_requeridos, 'idBeneficiario' => $beneficiario->id_beneficiario ]) }}" method="post" id="form-agregar">

                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button class="btn btn-danger btn-small btn-agregar">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                        </form>
                    </center> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div>
@endif