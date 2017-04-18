@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Donadores registrados
            </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="tgeneral">
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
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

   
@endsection