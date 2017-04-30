@extends('layouts.app')

@section('content')

@if(count($beneficiarios) <= 0) 
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Salida de medicamento
                </div>
                @include('salidaMedicamento.buscadorBeneficiario')
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
                    Salida de medicamento
                </div>
                
                @include('salidaMedicamento.buscadorBeneficiario')

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Domicilio</th>
                                <th>Comunidad</th>
                                <th>Fecha de nacimiento</th>
                                <th>Fecha de registro</th>
                                <th>Salida medicamento</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($beneficiarios as $beneficiario)
                            <tr>
                                <td>{{ $beneficiario->nombre . ' ' . $beneficiario->ap_paterno . ' ' . $beneficiario->ap_materno }}</td>
                                <td>{{ $beneficiario->domicilio }}</td>
                                <td>{{ $beneficiario->comunidad }}</td>
                                <td>{{ $beneficiario->fecha_nacimiento }}</td>
                                <td>{{ $beneficiario->fecha_registro }}</td>
                                <td>
                                    <center>
                                        <a href="{{ route('ruta_verificar_medicamento', ['id' => $beneficiario->id_beneficiario]) }}">
                                            <button class="btn btn-success btn-small ">
                                                Ir
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
        <center>{{ $beneficiarios->links() }}</center>
    </div>
@endif
   
@endsection