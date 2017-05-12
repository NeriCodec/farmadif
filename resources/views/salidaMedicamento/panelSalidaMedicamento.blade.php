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
        
        <div class="row">
            <div class="col-lg-6" style="margin-bottom: 5%;">
                @if(count($medicamentosAgregados) == 0) 
                <a href="{{ route('ruta_salida_sin_medicamentos') }}">
                        <button class="btn btn-success btn-small" style="float: right;">
                        Cancelar y volver
                        </button>
                </a>
                @else
                <a href="{{ route('ruta_salida_medicamentos') }}">
                    <button class="btn btn-success btn-small" style="float: right;">
                        Volver a pagina principal
                    </button>
                </a>
                @endif

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