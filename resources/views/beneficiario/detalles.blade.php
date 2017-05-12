@extends('layouts.app')

@section('content')



<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Detalles de beneficiario</h4>
            </div>
             @include('beneficiario.datos')

             <br>
             <center><h3>Mis medicamentos donados</h3></center>
            {{-- <div class="panel-body"> --}}
                <table width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="info">
                            <th>Nombre comercial</th>
                            <th>Nombre compuesto</th>
                            <th>No. etiqueta</th>
                            <th>No. folio</th>
                            <th>Cantidad</th>
                            <th>Diagnostico</th>
                            <th>Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detalles as $medicamento)
                        <tr>
                            <th>{{ $medicamento->nombre_comercial }}</th>
                            <th>{{ $medicamento->nombre_compuesto }}</th>
                            <th>{{ $medicamento->num_etiqueta }}</th>
                            <th>{{ $medicamento->num_folio }}</th>
                            <th>{{ $medicamento->cantidad }}</th>
                            <th>{{ $medicamento->diagnostico }}</th>
                            <th>{{ $medicamento->descripcion }}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            {{-- </div> --}}
        </div>
    </div>
</div>
   
@endsection