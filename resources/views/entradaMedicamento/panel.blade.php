@extends('layouts.app')

@section('content')

@if(count($donadores) <= 0) 
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Selecccionar Donador
                </div>
                @include('entradaMedicamento.buscarDonador')
                <br><br><br>
                <center><h4>No se encontro el beneficiario</h4></center>
                <br><br><br>
            </div>
        </div>
    </div>
@else
     <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Selecionar donador
                </div>
                
                @include('entradaMedicamento.buscarDonador')

                <div class="panel-body">
                     <table width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Domicilio</th>
                            <th>No. telefonico</th>
                            <th>Codigo postal</th>
                            <th>Fecha de registro</th>
                            <th>Seleccionar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($donadores as $donador)
                        <tr>
                            <td>{{ $donador->nombre }}</td>
                            <td>{{ $donador->domicilio }}</td>
                            <td>{{ $donador->num_telefonico }}</td>
                            <td>{{ $donador->codigo_postal }}</td>
                            <td>{{ $donador->fecha_registro }}</td>
                            <td>
                                <center>
                                <a href="{{ route('ruta_seleccionar_donador', ['id' => $donador->id_donador]) }}">
                                     <button class="btn btn-success btn-small ">
                                           <span class="glyphicon glyphicon-copy" aria-hidden="true"></span>
                                     </button> 
                                </a>
                                </center>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <center>{{ $donadores->links() }}</center>
    </div>
@endif
   
@endsection