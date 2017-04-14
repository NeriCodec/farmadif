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
                            <input class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripcion" value="{{ old('descripcion') }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Diagnostico:</label>
                            <input class="form-control" name="diagnostico" id="diagnostico" placeholder="Ingrese el diagnostico" value="{{ old('diagnostico') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Buscar medicamentos
            </div>
            <div class="panel-body">
            <form action="{{ route('ruta_salida_medicamento', ['id' => $beneficiario->id_beneficiario]) }}" method="get">
                <div class="form-group input-group">
                    <input type="text" name="medicamento" class="form-control" placeholder="Buscar medicamento">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            Buscar
                        </button>
                    </span>
                </div>
            </div>
            </form>
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
                            <th>Agregar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($medicamentos as $medicamento)
                        <tr>
                            <td>{{ $medicamento->nombre_comercial}}</td>
                            <td>{{ $medicamento->nombre_compuesto}}</td>
                            <td>{{ $medicamento->num_etiqueta}}</td>
                            <td>{{ $medicamento->num_folio}}</td>
                            <td>{{ $medicamento->fecha_caducidad}}</td>
                            <td>{{ $medicamento->cantidad}}</td>
                            <td>{{ $medicamento->solucion_tableta}}</td>
                            <td>{{ $medicamento->tipo_contenido}}</td>
                            <td>
                            <center>
                                <a href="#">
                                    <button class="btn btn-warning btn-small ">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </button> 
                                </a>
                            </center>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <center>{{ $medicamentos->appends(Request::all())->render() }}</center>
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