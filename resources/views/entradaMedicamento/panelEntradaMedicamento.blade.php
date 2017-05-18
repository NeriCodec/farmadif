@extends('layouts.app')

@section('content')

@include('entradaMedicamento.datosDonador')

<!--inicia buscar-->
    <div class="row">
        <div class="col-lg-12">
                  <!-- Nav tabs -->
                  @include('entradaMedicamento.medicamentoDonados')
                  <!-- Tab panes -->
        </div>
</div>
<!--termina buscar-->
@endsection