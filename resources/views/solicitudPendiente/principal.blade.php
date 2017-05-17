@extends('layouts.app')

@section('content')

<div class="panel panel-default">

    <div class="panel-heading">
    	<div class="row">
    		<div class="col-md-8">
    			<h4>Agregar medicamentos a la solicitud pendiente</h4>
    		</div>
            
            @if(count($medicamentosRequeridos) > 0 || count($medicamentos) > 0)
            <a href="#">
        		<input style="margin-right: 10px;" type="submit" class="btn btn-danger pull-right" disabled="disabled" value="Cancelar">
            </a>
            @else
            <a href="{{ route('ruta_cancelar_solicitud') }}">
                <input style="margin-right: 10px;" type="submit" class="btn btn-danger pull-right" value="Cancelar">
            </a>
            @endif

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