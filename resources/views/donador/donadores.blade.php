@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Donadores registrados
            </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Domicilio</th>
                            <th>No. telefonico</th>
                            <th>Codigo postal</th>
                            <th>Fecha de registro</th>
                            <th>Actualizar</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($donadores as $donador)
                        <tr>
                            <td>{{ $donador->nombre}}</td>
                            <td>{{ $donador->domicilio}}</td>
                            <td>{{ $donador->num_telefonico}}</td>
                            <td>{{ $donador->codigo_postal}}</td>
                            <td>{{ $donador->fecha_registro}}</td>
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
    <center>{{ $donadores->links() }}</center>
</div>

   
@endsection