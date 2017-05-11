@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Donadores registrados
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="tmedicamento">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
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
                                <th>{{ $medicamento->nombre_comercial }}</th>
                                <th>{{ $medicamento->nombre_compuesto }}</th>
                                <th>{{ $medicamento->num_etiqueta }}</th>
                                <th>{{ $medicamento->num_folio }}</th>
                                <th>{{ $medicamento->fecha_caducidad }}</th>
                                <th>{{ $medicamento->cantidad }}</th>
                                <th>{{ $medicamento->solucion_tableta }}</th>
                                <th>{{ $medicamento->tipo_contenido }}</th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <center>{{ $medicamentos->links() }}</center>
                </div>
            </div>
            
        </div>
    </div>
@endsection