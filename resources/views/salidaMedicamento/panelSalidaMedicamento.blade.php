@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Verificacion de datos
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
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Receta Medica:</label>
                            <select class="form-control">
                                <option>SI</option>
                                <option>NO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Copia de IFE o INE:</label>
                            <select class="form-control">
                                <option>SI</option>
                                <option>NO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Fotografia:</label>
                            <select class="form-control">
                                <option>SI</option>
                                <option>NO</option>
                            </select>
                        </div>
                    </div>
                     <div class="col-lg-2">
                        <div class="form-group">
                            <label>Solicitud:</label>
                            <select class="form-control">
                                <option>SI</option>
                                <option>NO</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Descripcion de apoyo:</label>
                            <input class="form-control" placeholder="Ingrese la descripcion">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Diagnostico:</label>
                            <input class="form-control" placeholder="Ingrese el diagnostico">
                        </div>
                    </div>
                </div>
                {{-- @include('templates.panel_buscar') --}}
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Medicamentos
            </div>
            <div class="panel-body">
            <form action="" method="post">
                <div class="form-group input-group">
                    <input type="text" name="dato" class="form-control" placeholder="Buscar medicamento">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                        </button>
                    </span>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Medicamentos salida
            </div>
            <div class="panel-body">
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <button class="btn btn-default btn-small" style="float: right;">Aceptar</button>
    <a href="{{ route('ruta_salida_medicamentos') }}">
        <button class="btn btn-default btn-small" style="float: right; margin-right: 1%;">Cancelar</button>
    </a>
</div>

   
@endsection