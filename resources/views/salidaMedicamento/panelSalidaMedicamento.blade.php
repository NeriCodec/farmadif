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
                            <input class="form-control" name="descripcion" placeholder="Ingrese la descripcion">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Diagnostico:</label>
                            <input class="form-control" name="diagnostico" placeholder="Ingrese el diagnostico">
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
            <form class="navbar-form navbar-left pull-right" action="" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" name="medicamento" placeholder="Buscar">
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>
            </form>
            <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="tagregarmedicamento">
                <thead>
                    <tr>
                        <th>ID</th>
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
                        <th>{{ $medicamento->id_medicamento }}</th>
                        <th>{{ $medicamento->nombre_comercial }}</th>
                        <th>{{ $medicamento->nombre_compuesto }}</th>
                        <th>{{ $medicamento->num_etiqueta }}</th>
                        <th>{{ $medicamento->num_folio }}</th>
                        <th>{{ $medicamento->fecha_caducidad }}</th>
                        <th>{{ $medicamento->cantidad }}</th>
                        <th>{{ $medicamento->solucion_tableta }}</th>
                        <th>{{ $medicamento->tipo_contenido }}</th>
                        <td>
                            <center><button class="btn btn-primary btn-small">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button></center>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

<form action="{{ route('ruta_agregar_medicamento', array(':MEDICAMENTO_ID', $beneficiario->id_beneficiario)) }}" method="post" id="form-agregar">
    {{ csrf_field() }}
</form>

<form action="{{ route('ruta_eliminar_medicamento', array(':MEDICAMENTO_ID', $beneficiario->id_beneficiario)) }}" method="post" id="form-eliminar">
    {{ csrf_field() }}
</form>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Medicamentos salida
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" >
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nombre comercial</td>
                            <td>Nombre compuesto</td>
                            <td>No. etiqueta</td>
                            <td>No. folio</td>
                            <td>Fecha caducidad</td>
                            <td>Cantidad</td>
                            <td>Solucion/Tableta</td>
                            <td>Contenido</td>
                            <td>Eliminar</td>
                        </tr>
                    </thead>
                    <tbody id="tablaMedicamentos">
                        
                    </tbody>
                    
                </table>
              {{--   <table width="100%" class="table table-striped table-bordered table-hover" id="tbTodosLosMedicamentos">
                </table> --}}
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12" style="margin-bottom: 5%;">
    {{-- <form action="" method="post"> --}}
        {{-- {{ csrf_field() }} --}}
        <button class="btn btn-default btn-small" style="float: right;">Aceptar</button>
    {{-- </form> --}}
    
    <a href="{{ route('ruta_salida_medicamentos') }}">
        <button class="btn btn-default btn-small" style="float: right; margin-right: 1%;">Volver</button>
    </a>
</div>

   
@endsection