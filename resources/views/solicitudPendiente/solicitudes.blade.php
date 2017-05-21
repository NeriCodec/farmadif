@extends('layouts.app')

@section('content')
@if(count($solicitudes) <= 0) 
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Solicitud de medicamento
                </div>
                @include('beneficiario.buscar')
                <br><br><br>
                <center><h4>No se encontro la solicitud</h4></center>
                <br><br><br>
            </div>
        </div>
    </div>
@else
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Solicitudes registradas
            </div>
            @include('solicitudPendiente.buscar')
            <div class="panel-body">
                <table width="100%" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            {{-- <th width="5%" style="font-size: 13px;">Actualizar</th> --}}
                            <th width="1%"></th>
                            <th width="5%"><center>Detalles</center></th>
                            <th width="5%" style="font-size: 13px;">No. solicitud</th>
                            <th>Descripcion</th>
                            <th>Diagnostico</th>
                            <th>Estatus</th>
                            <th>Fecha</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($solicitudes as $solicitud)
                        <tr>
                            <td style="background-color: @if($solicitud->tipo_solicitud == 'Realizada') green @else yellow @endif ;"></td>
                            <td>
                                <center>
                                    <a href="#">
                                        <button class="btn btn-default btn-small ">
                                            <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                                        </button> 
                                    </a>
                                </center>
                            </td>
                            <td><center><b># {{ $solicitud->id_solicitud }}</b></center></td>
                            <td>{{ $solicitud->descripcion }}</td>
                            <td>{{ $solicitud->diagnostico }}</td>
                            <td>{{ $solicitud->tipo_solicitud }}</td>
                            <td>{{ $solicitud->fecha_solicitud }}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <center>{{ $solicitudes->links() }}</center>
        </div>
    </div>
</div>
@endif
   
@endsection