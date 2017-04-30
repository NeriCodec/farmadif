@extends('layouts.app')

@section('content')

@include('salidaMedicamento.panelDatosBeneficiario')

@if($verificado == 'si')
<div id="salida-medicamentos">

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Buscar medicamentos
            </div>
            <form class="navbar-form navbar-left pull-right" action="" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" name="medicamento" placeholder="Buscar">
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>
            </form>
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
        <button class="btn btn-success btn-small" style="float: right; margin-right: 1%;">Salir</button>
    </a>
</div>
    
</div>
@endif
   
@endsection