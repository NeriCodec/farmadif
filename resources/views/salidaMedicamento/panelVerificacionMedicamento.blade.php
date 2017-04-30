@extends('layouts.app')

@section('content')

@include('salidaMedicamento.panelDatosBeneficiario')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Verificacion de datos
            </div>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12" id="datos-verificados"></div>
            </div>
            <div class="panel-body" id="datos-a-verificar">
                <form action="{{ route('ruta_verificar_medicamento', ['id' => $beneficiario->id_beneficiario]) }}" method="post" id="form-verificar">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Receta Medica:</label>
                            <select class="form-control" name="receta_medica" id="receta_medica">
                                <option>NO</option>
                                <option>SI</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Copia de IFE o INE:</label>
                            <select class="form-control" name="ife_ine" id="ife_ine">
                                <option>NO</option>
                                <option>SI</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Fotografia:</label>
                            <select class="form-control" name="fotografia" id="fotografia">
                                <option>NO</option>
                                <option>SI</option>
                            </select>
                        </div>
                    </div>
                     <div class="col-lg-2">
                        <div class="form-group">
                            <label>Solicitud:</label>
                            <select class="form-control" name="solicitud" id="solicitud">
                                <option>NO</option>
                                <option>SI</option>
                            </select>
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
                <button class="btn btn-success btn-small" type="submit" style="float: right;" id="btn-verificar">Verificar</button>
                </form>
            </div>
        </div>
    </div>

</div>
   
@endsection