@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Salida de medicamento
            </div>
            
            <form class="navbar-form navbar-left pull-right" action="{{ route('ruta_salida_medicamentos') }}" method="get">
              <div class="form-group">
                <input type="text" class="form-control" name="beneficiario" placeholder="Buscar">
              </div>
              <button type="submit" class="btn btn-default">Buscar</button>
            </form>
            
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
                                    <a href="{{ route('ruta_salida_medicamento', ['id' => $beneficiario->id_beneficiario]) }}">
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

   
@endsection