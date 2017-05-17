@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Detalles de beneficiario</h4>
            </div>
             @include('beneficiario.datos')
             <div class="panel-heading">
                <h4>Medicamentos donados</h4>
            </div>
           

            <div style="height:500px; overflow: auto;">
            <table class="table table-striped">
                <thead>
                    <tr class="info">
                        <th>Nombre comercial</th>
                        <th>Nombre compuesto</th>
                        <th>Descripcion</th>
                        <th>Diagnostico</th>
                        <th>No. etiqueta</th>
                        <th>No. folio</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($detalles as $medicamento)
                    <tr>
                        <td>{{ $medicamento->nombre_comercial }}</td>
                        <td>{{ $medicamento->nombre_compuesto }}</td>
                        <td>{{ $medicamento->descripcion }}</td>
                        <td>{{ $medicamento->diagnostico }}</td>
                        <td>{{ $medicamento->num_etiqueta }}</td>
                        <td>{{ $medicamento->num_folio }}</td>

                        <td>
                         <center>
                            <form action="" method="post">
                                {{ csrf_field() }}
                                <button class="btn btn-danger btn-small btn-agregar">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>
                            </form>
                        </center>
                        </td> 

                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
   
@endsection