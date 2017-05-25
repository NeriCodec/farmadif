@extends('layouts.app')

@section('content')

<div class="panel panel-default">

    <div class="panel-heading">
    	<div class="row">
    		<div class="col-md-8">
    			Solicitud pendiente (# {{$noSolicitud}})
    		</div>

            <a href="{{ route('ruta_salida_verificada_medicamentos', ['idBeneficiario' => $beneficiario->id_beneficiario]) }}">
                <input style="margin-right: 10px;" type="submit" class="btn btn-default pull-right" value="Volver">
            </a>
    	</div>
		
    </div>
	
	@include('solicitudPendiente.panelDatosBeneficiario')
    <br>
	
	@include('solicitudPendiente.registroMedicamento')
    
    <div class="panel panel-default">
        <div class="panel-heading">
    	   <h4>Medicamentos requeridos</h4>
        </div>
        
        @include('solicitudPendiente.tablaMedicamentosAgregados')
        
    </div>

</div>
@endsection