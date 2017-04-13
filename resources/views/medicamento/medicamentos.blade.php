@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Donadores registrados
            </div>
            <div class="panel-body">
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
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($medicamentos as $medicamento)
                        <tr>
                            <td>{{ $medicamento->nombre_comercial}}</td>
                            <td>{{ $medicamento->nombre_compuesto}}</td>
                            <td>{{ $medicamento->num_etiqueta}}</td>
                            <td>{{ $medicamento->num_folio}}</td>
                            <td>{{ $medicamento->fecha_caducidad}}</td>
                            <td>{{ $medicamento->cantidad}}</td>
                            <td>{{ $medicamento->solucion_tableta}}</td>
                            <td>{{ $medicamento->tipo_contenido}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <center>{{ $medicamentos->links() }}</center>
</div>

   
@endsection