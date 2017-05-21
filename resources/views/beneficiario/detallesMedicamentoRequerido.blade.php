@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Detalles de beneficiario
                <a href="{{ route('ruta_salida_medicamentos') }}" >
                    <input style="margin-right: 10px;" type="submit" class="btn btn-default pull-right" value="Volver">
                </a>
            </div>
             @include('beneficiario.datos')
             <div class="panel-heading">
                Medicamentos donados
            </div>
           

            <div style="height:500px; overflow: auto;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="5%">No. Solicitud</th>
                        <th width="10%">No. Folio</th>
                        <th>Nombre comercial</th>
                        <th>Nombre compuesto</th>
                        <th>Descripcion</th>
                        <th>Diagnostico</th>
                        {{-- <th><center>Existencia</center></th> --}}
                        <th><center>Estatus Solicitud</center></th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($detalles as $medicamento)
                    <tr>
                        <th># {{ $medicamento->id_solicitud }}</th>
                        <th># {{ $medicamento->num_folio }}</th>
                        <td>{{ $medicamento->nombre_comercial }}</td>
                        <td>{{ $medicamento->nombre_compuesto }}</td>
                        <td>{{ $medicamento->descripcion }}</td>
                        <td>{{ $medicamento->diagnostico }}</td>

                        @if($medicamento->estatus == "requerido") 
                        <td class="danger"><center><b>Sin provision</b></center></td>
                        @elseif($medicamento->estatus == "donado")
                         <td class="success"><center><b>Donado</b></center></td>
                        @else
                         <td class="success"><center><b>En existencia</b></center></td>
                        @endif
                        {{-- <td class="success"><center><b>En existencia</b></center></td> --}}
                       
{{-- 
                        @if($medicamento->estatus == "donado") 
                        <td class="success"><center><b>Donado</b></center></td>
                        @else
                         <td class="danger"><center><b>#</b></center></td>
                        @endif --}}

                        {{-- @if($medicamento->estatus_solicitud == "donado") 
                        <td class="success"><center><b>Donado</b></center></td>
                        @else 
                        <td class="danger"><center><b>Sin donar</b></center></td>
                        @endif --}}

                        <td>
                         <center>
                            {{-- <form action="" method="post"> --}}
                                {{-- {{ csrf_field() }} --}}
                            <button type="button" class="btn btn-danger btn-small btn-agregar" data-toggle="modal" data-target="#confirmacion{{ $medicamento->num_folio }}">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </button>
                            {{-- </form> --}}
                        </center>

                        </td> 

                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="confirmacion{{ $medicamento->num_folio }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Esta seguro de eliminar</h4>
                          </div>
                          <div class="modal-body">
                            Eliminar este medicamento <b>{{ $medicamento->nombre_comercial }}</b>, una vez realizado esto, el medicamento ya no estara como una solicitud.
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Confirmar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
   
@endsection