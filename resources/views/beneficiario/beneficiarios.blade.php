@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Beneficiarios registrados
            </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="tbeneficiarios">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Domicilio</th>
                            <th>Comunidad</th>
                            <th>Fecha de nacimiento</th>
                            <th>Fecha de registro</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

   
@endsection