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
                        @foreach($detalles as $medicamento)
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
   
@endsection