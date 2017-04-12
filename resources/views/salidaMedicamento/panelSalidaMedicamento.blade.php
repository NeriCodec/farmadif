@extends('templates.panel')

@section('panel-contenedor')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Beneficiario
            </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Domicilio</th>
                            <th>Comunidad</th>
                            <th>Fecha de nacimiento</th>
                            <th>Fecha de registro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $beneficiario->nombre . ' ' . $beneficiario->ap_paterno . ' ' . $beneficiario->ap_materno }}</td>
                            <td>{{ $beneficiario->domicilio }}</td>
                            <td>{{ $beneficiario->comunidad }}</td>
                            <td>{{ $beneficiario->fecha_nacimiento }}</td>
                            <td>{{ $beneficiario->fecha_registro }}</td>
                        </tr>
                    </tbody>
                </table>
                @include('templates.panel_buscar')
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <button class="btn btn-default btn-small" style="float: right;">Siguente</button>
        <a href="{{ route('ruta_salida_medicamentos') }}">
            <button class="btn btn-default btn-small" style="float: right; margin-right: 1%;">Volver</button>
        </a>
    </div>
</div>

   
@endsection