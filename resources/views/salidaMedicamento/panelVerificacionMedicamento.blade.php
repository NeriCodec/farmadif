@extends('layouts.app')

@section('content')



<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">

            

            <div class="panel-heading">
                Solicitud de medicamento
            </div>

            @include('salidaMedicamento.panelDatosBeneficiario')
            
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="panel-body">
                <form action="{{ route('ruta_verificar_medicamento', ['idBeneficiario' => $beneficiario->id_beneficiario]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Receta medica</label>
                            <input type="file" name="receta">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Descripcion de apoyo:</label>
                            <input class="form-control" name="descripcion" value="{{ old('descripcion') }}" placeholder="Ingrese la descripcion" id="descripcion">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Diagnostico:</label>
                            <input class="form-control" name="diagnostico" value="{{ old('diagnostico') }}" placeholder="Ingrese el diagnostico" id="diagnostico">
                        </div>
                    </div>
                </div>
                <button class="btn btn-success btn-small" type="submit" style="float: right;" id="btn-verificar">Validar solicitud</button>
                </form>
            </div>
        </div>
    </div>

</div>
   
@endsection