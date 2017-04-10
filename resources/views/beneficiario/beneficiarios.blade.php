@extends('templates.panel')

@section('panel-contenedor')
	@foreach($beneficiarios as $beneficiario)
		<strong>Nombre: </strong><li>{{ $beneficiario->nombre . $beneficiario->ap_paterno . $beneficiario->ap_materno }}</li>
		<strong>Domicilio: </strong><li>{{ $beneficiario->domicilio }}</li>
		<strong>Comunidad: </strong><li>{{ $beneficiario->comunidad }}</li>
		<strong>Fecha de nacimiento: </strong><li>{{ $beneficiario->fecha_nacimiento }}</li>
	@endforeach
@endsection