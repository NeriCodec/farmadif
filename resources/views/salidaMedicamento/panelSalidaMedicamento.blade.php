@extends('layouts.app')

@section('content')
    
     <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">

                        Datos de la salida de medicamento

                        <a class="btn btn-warning btn-small pull-right" style="margin-right: 10px;" href="{{ route('ruta_solicitud_pendiente' , ['idBeneficiario' => $beneficiario->id_beneficiario]) }}">
                            {{ csrf_field() }}
                            Dejar solicitud pendiente.
                            <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
                        </a>
                        
                        @if(count($medicamentosRequeridos) < 0 && 
                            count($medicamentosAgregados) < 0) 
                        <a class="btn btn-danger btn-small pull-right" style="margin-right: 10px;" href="{{ route('ruta_salida_sin_medicamentos') }}">
                                Cancelar y volver
                        </a>
                        @else
                        <a class="btn btn-success btn-small  pull-right" style="margin-right: 10px;" href="{{ route('ruta_salida_medicamentos') }}">
                                Volver a pagina principal
                        </a>
                        @endif
                        </div>
                    </div>

                    @include('salidaMedicamento.panelDatosBeneficiario')

                </div>
            </div>
        </div>
    

    <div id="salida-medicamentos">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Buscar medicamentos
                    </div>  
                    @include('salidaMedicamento.buscadorMedicamento')
                    <div class="panel-body" id="tablaMedicamentos">
                        @include('salidaMedicamento.tablaMedicamentos')
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Medicamentos salida
                    </div>
                    @include('salidaMedicamento.tablaMedicamentosAgregados')
                </div>
            </div>
        </div>  
        
    </div>
   
@endsection