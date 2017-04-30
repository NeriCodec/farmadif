@extends('layouts.app')

@section('content')

    @include('salidaMedicamento.panelDatosBeneficiario')

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

        <div class="col-lg-12" style="margin-bottom: 5%;">
            <a href="{{ route('ruta_salida_medicamentos') }}">
                <button class="btn btn-success btn-small" style="float: right; margin-right: 1%;">
                <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                Salir
                </button>
            </a>
        </div>
        
    </div>
   
@endsection