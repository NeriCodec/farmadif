@extends('layouts.app')

@section('content')
@if(count($beneficiarios) <= 0) 
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Salida de medicamento
                </div>
                @include('beneficiario.buscar')
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
                Beneficiarios registrados
            </div>
            @include('beneficiario.buscar')
            <div class="panel-body">
                <table width="100%" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="5%" style="font-size: 13px;">Actualizar</th>
                            <th width="5%" style="font-size: 13px;">Eliminar</th>
                            <th>Nombre</th>
                            <th>Domicilio</th>
                            <th>Comunidad</th>
                            <th>Fecha de nacimiento</th>
                            <th>Fecha de registro</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($beneficiarios as $beneficiario)
                        <tr>
                            <td>
                                <center>
                                    <a href="{{ route('ruta_seleccionar_actualizar_beneficiario', ['idBeneficiario' => $beneficiario->id_beneficiario]) }}">
                                        <button class="btn btn-default btn-small ">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </button> 
                                    </a>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <a href="{{ route('ruta_eliminar_beneficiario', ['idBeneficiario' => $beneficiario->id_beneficiario]) }}">
                                        <button class="btn btn-default btn-small ">
                                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        </button> 
                                    </a>
                                </center>
                            </td>
                            <td>{{ $beneficiario->nombre . " " . $beneficiario->ap_paterno . " " .$beneficiario->ap_materno}}</td>
                            <td>{{ $beneficiario->domicilio}}</td>
                            <td>{{ $beneficiario->comunidad}}</td>
                            <td>{{ $beneficiario->fecha_nacimiento}}</td>
                            <td>{{ $beneficiario->fecha_registro}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif
   
@endsection