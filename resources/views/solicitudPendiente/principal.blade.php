@extends('layouts.app')

@section('content')

<div class="panel panel-default">

    <div class="panel-heading">
		<h4>Agregar medicamentos para la solicitud pendiente (cambiar esto)</h4>
    </div>
	
	@include('solicitudPendiente.panelDatosBeneficiario')
    <br>
	
	@include('solicitudPendiente.registroMedicamento')

	{{-- @include('solicitudPendiente.tablaMedicamentosAgregados'); --}}

</div>
@endsection