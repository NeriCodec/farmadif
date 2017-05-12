@extends('layouts.app')

@section('content')
    
     <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Datos de la salida de medicamento
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
                        @if(count($medicamentos) > 0) 
                            @include('salidaMedicamento.tablaMedicamentos')
                        @else 
                            <div class="row">
                                <div class="col-lg-12">
                                    <center><h4>Buscar medicamento </h4><span class="glyphicon glyphicon-search" aria-hidden="true"></span></center>

                                </div>
                            </div>
                        @endif
                        
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
        
        <div class="row">
            <div class="col-lg-6" style="margin-bottom: 5%;">
                <a href="{{ route('ruta_salida_medicamentos') }}">
                    <button class="btn btn-success btn-small" style="float: right;">
                    Volver a pagina principal
                    </button>
                </a>
            </div>
            <div class="col-lg-6" style="margin-bottom: 5%;">
                <a href="#">
                    <button class="btn btn-danger btn-small" style="float: left;">
                    Dejar pendiente solicitud.
                    </button>
                </a>
            </div>
        </div>
        
        
    </div>
   
@endsection