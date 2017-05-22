@extends('layouts.app')

@section('content')
@if(count($solicitudes) <= 0) 
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Solicitud de medicamento
                </div>
                @include('solicitudPendiente.buscar')
                <br><br><br>
                <center><h4>No se encontro la solicitud</h4></center>
                <br><br><br>
            </div>
        </div>
    </div>
@else
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Solicitudes registradas
            </div>
            @include('solicitudPendiente.buscar')
            <div class="panel-body">
                <table width="100%" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="1%"></th>
                            <th width="5%"><center>Salida Medicamento</center></th>
                            <th width="8%"><center>Dias para liberar</center></th>
                            <th width="5%"><center>Liberar Medicamento</center></th>
                            <th width="5%" style="font-size: 13px;">No. solicitud</th>
                            <th>Beneficiario</th>
                            <th>Medicamento</th>
                            <th>Estatus</th>
                            <th>Descripcion</th>
                            <th>Diagnostico</th>
                            <th>Fecha</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($solicitudes as $solicitud)
                        <tr>
                            <td style="background-color: @if($solicitud->estatus == "existencia") #1F8A70 @else #FFE161 @endif ;"></td>
                            <td>
                                <center>
                                     <button type="button" class="btn btn-default btn-small btn-agregar @if($solicitud->estatus == 'requerido') disabled @endif" @if($solicitud->estatus == 'existencia') data-toggle="modal" data-target="#confirmacion{{ $solicitud->id_medicamentos_requeridos }}" @endif>
                                        <span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>
                                    </button>
                                </center>
                            </td>
                            <td><center><b>2 dias</b></center></td>
                            <td>
                                <center>
                                    <a href="#">
                                        <button class="btn btn-default btn-small">
                                            <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                        </button> 
                                    </a>
                                </center>
                            </td>
                            <td><center><b># {{ $solicitud->id_solicitud }}</b></center></td>
                            <td><b>{{ $solicitud->nombre }}</b></td>
                            <td>{{ $solicitud->nombre_comercial }}</td>
                            <td><b>{{ $solicitud->estatus }}</b></td>
                            <td>{{ $solicitud->descripcion }}</td>
                            <td>{{ $solicitud->diagnostico }}</td>
                            <td>{{ $solicitud->fecha_solicitud }}</td>
                            {{-- <th>{{ $solicitud->id_medicamentos_requeridos}}</th> --}}
                            
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="confirmacion{{ $solicitud->id_medicamentos_requeridos }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Verificacion de salida.</h4>
                              </div>
                              <div class="modal-body">
                                Donar el medicamento <b>{{ $solicitud->nombre_comercial . ' (' . $solicitud->nombre_compuesto . ')'}}</b>
                              </div>
                              <div class="modal-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                         <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                                         
                                         <a href="{{ route('ruta_solicitud_salida', ['idSolicitu' => $solicitud->id_solicitud, 'idMedicamento' => $solicitud->id_medicamento, 'idBeneficiario' => $solicitud->id_beneficiario, 'idMedicamentoRequerido' => $solicitud->id_medicamentos_requeridos]) }}" >

                                            {{-- {{ csrf_field() }} --}}
                                            <button type="submit" class="btn btn-success">Confirmar</button>

                                        </a>

                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- <center>{{ $solicitudes->links() }}</center> --}}
        </div>
    </div>
</div>
@endif
   
@endsection