@extends('layouts.app')

@section('content')



<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">

            

            <div class="panel-heading">
                Solicitud de medicamento
            </div>

            @include('salidaMedicamento.panelDatosBeneficiario')
            
            <div class="panel-body">
                <form action="{{ route('ruta_verificar_medicamento', ['idBeneficiario' => $beneficiario->id_beneficiario]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group{{ $errors->has('receta') ? ' has-error' : '' }}">
                            <label>Receta medica</label>
                            <input type="file" name="receta">
                            @if ($errors->has('receta'))
                            <span class="help-block">
                                <strong>{{ $errors->first('receta') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label>Descripcion de apoyo:</label>
                            <input class="form-control" name="descripcion" value="{{ old('descripcion') }}" placeholder="Ingrese la descripcion" id="descripcion">
                            @if ($errors->has('descripcion'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="form-group{{ $errors->has('diagnostico') ? ' has-error' : '' }}">
                            <label>Diagnostico:</label>
                            <input class="form-control" name="diagnostico" value="{{ old('diagnostico') }}" placeholder="Ingrese el diagnostico" id="diagnostico">
                            @if ($errors->has('diagnostico'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('diagnostico') }}</strong>
                                </span>
                            @endif
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