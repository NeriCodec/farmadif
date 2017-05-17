@extends('layouts.app')

@section('content')

<div class="panel panel-default">

    <div class="panel-heading">
    	<div class="row">
    		<div class="col-md-8">
    			<h4>Agregar medicamentos a la solicitud pendiente</h4>
    		</div>
            @if(count($medicamentosRequeridos) > 0)
            <a href="#">
        		<div class="col-md-4">
        			<input type="submit" class="btn btn-default pull-right" disabled="disabled" value="Cancelar">
        		</div>
            </a>
            @else
            <a href="{{ route('ruta_cancelar_solicitud') }}">
                <div class="col-md-4">
                    <input type="submit" class="btn btn-default pull-right" value="Cancelar">
                </div>
            </a>
            @endif
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