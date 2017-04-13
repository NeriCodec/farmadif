@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Beneficiarios registrados
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
                            <th>Actualizar</th>
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
                                <center><button class="btn btn-primary btn-small">
                                    Ir
                                </button></center>
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