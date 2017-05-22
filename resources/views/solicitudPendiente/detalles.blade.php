@extends('layouts.app')

@section('content')

@include('solicitudPendiente.panelDatosBeneficiario')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Detalle de la solicitud
            </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="5%" style="font-size: 13px;">No. solicitud</th>
                            <th>Descripcion</th>
                            <th>Diagnostico</th>
                            <th>Fecha</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><center><b># {{ $solicitud->id_solicitud }}</b></center></td>
                            <td>{{ $solicitud->descripcion }}</td>
                            <td>{{ $solicitud->diagnostico }}</td>
                            <td>{{ $solicitud->fecha_solicitud }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Medicamentos solicitados
            </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nombre comercial</th>
                            <th>Nombre compuesto</th>
                            <th>Descripcion</th>
                            <th>Diagnostico</th>
                            <th>Estatus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($medicamentos as $medicamento)
                        <tr>
                            <td>{{ $medicamento->nombre_comercial }}</td>
                            <td>{{ $medicamento->nombre_compuesto }}</td>
                            <td>{{ $medicamento->descripcion }}</td>
                            <td>{{ $medicamento->diagnostico }}</td>
                            <th>{{ $medicamento->estatus_solicitud }}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
   
@endsection