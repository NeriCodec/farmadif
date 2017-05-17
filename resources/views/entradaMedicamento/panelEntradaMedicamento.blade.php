@extends('layouts.app')

@section('content')

@include('entradaMedicamento.datosDonador')

<!--inicia buscar-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Selecionar medicamento
                </div>
                  <div>
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#misMedicamentos" aria-controls="misMedicamentos" role="tab" data-toggle="tab">Medicamentos donados</a></li>
                    <li role="presentation"><a href="#todosMedicamentos" aria-controls="todosMedicamentos" role="tab" data-toggle="tab">Todos los medicamentos</a></li>
                    <li role="presentation">
                      <a href="#medicamentosRequeridos" role="tab" data-toggle="tab">Medicamentos requeridos</a>
                    </li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="misMedicamentos">
                    @include('entradaMedicamento.misMedicamentos')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="todosMedicamentos">
                    @include('entradaMedicamento.medicamentoDonados')
                    </div>

                    <div role="tabpanel" class="tab-pane" id="medicamentosRequeridos">
                      @include('entradaMedicamento.medicamentosRequeridos')
                    </div>
                  </div>
                </div>

            </div>
        </div>
</div>
<!--termina buscar-->
@endsection