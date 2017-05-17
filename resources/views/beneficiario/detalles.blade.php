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

            {{-- <div style="height:500px; overflow: auto;"> --}}
            <table class="table table-fixed">
                <thead>
                    <tr class="info">
                        <th class="col-xs-2">Nombre comercial</th>
                        <th class="col-xs-2">Nombre compuesto</th>
                        <th class="col-xs-2">Descripcion</th>
                        <th class="col-xs-2">Diagnostico</th>
                        <th class="col-xs-2">No. etiqueta</th>
                        <th class="col-xs-2">No. folio</th>
                        <th class="col-xs-2"></th>
                        {{-- <th>Eliminar</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($detalles as $medicamento)
                    <tr>
                        <td class="col-xs-2">{{ $medicamento->nombre_comercial }}</td>
                        <td class="col-xs-2">{{ $medicamento->nombre_compuesto }}</td>
                        <td class="col-xs-2">{{ $medicamento->descripcion }}</td>
                        @if(strlen($medicamento->diagnostico) > 45)
                        @else
                        @endif
                        <td class="col-xs-2">{{ $medicamento->diagnostico }}</td>
                        <td class="col-xs-2">{{ $medicamento->num_etiqueta }}</td>
                        <td class="col-xs-2">{{ $medicamento->num_folio }}</td>
                        {{--<td>
                         <center>
                            <form action="" method="post">
                                {{ csrf_field() }}
                                <button class="btn btn-danger btn-small btn-agregar">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>
                            </form>
                        </center>
                        </td>  --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- </div> --}}
        </div>
    </div>
</div>
   
@endsection