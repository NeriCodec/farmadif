@extends('layouts.app')

@section('content')

@if(count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif


@if($actualizar)
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Actualizar donador
            </div>
            <div class="panel-body">

				<form action="{{ route('ruta_guardar_donador_actualizar') }}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-12">
							<input type="hidden" name="idDonador" value="{{ $donador->id_donador }}">
							<div class="form-group">
						        <label>Ingrese el nombre</label>
						        <input class="form-control" name='nombre' id='nombre' placeholder="Ingrese el nombre" value="{{ $donador->nombre }}" required>
						    </div>
						    <div class="form-group">
						        <label>Ingrese el domicilio</label>
						        <input class="form-control" name='domicilio' id='domicilio' placeholder="Ingrese el domicilio" value="{{ $donador->domicilio }}" required>
						    </div>
						     <div class="form-group">
						        <label>Numero telefonico</label>
						        <input class="form-control" name='telefono' id='telefono' placeholder="Ingrese el numero telefono" value="{{ $donador->num_telefonico }}" required>
						    </div>
						    <div class="form-group">
						        <label>Ingrese el codigo postal</label>
						        <input class="form-control" name='codigo' id='codigo' placeholder="Ingrese la codigo" value="{{ $donador->codigo_postal }}" required>
						    </div>
						    <div class="form-group">
				                <label>Observaciones</label>
				                <textarea class="form-control" name="observaciones" id="observaciones" required>
				                	{{ $donador->observaciones }}
				                </textarea>
				            </div>
						</div>
						<div class="col-md-12">
					    	<button type="submit" style="float: right;" class="btn btn-success btn-md">Guardar <i class="fa fa-check"></i>
					    </div>
				    </div>
				</form>

			</div>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Registrar donador
            </div>
            <div class="panel-body">

				<form action="{{ route('ruta_donador_registrar') }}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
						        <label>Ingrese el nombre</label>
						        <input class="form-control" name='nombre' id='nombre' placeholder="Ingrese el nombre" value="{{ old('nombre') }}" required>
						    </div>
						    <div class="form-group">
						        <label>Ingrese el domicilio</label>
						        <input class="form-control" name='domicilio' id='domicilio' placeholder="Ingrese el domicilio" value="{{ old('domicilio') }}" required>
						    </div>
						     <div class="form-group">
						        <label>Numero telefonico</label>
						        <input class="form-control" name='telefono' id='telefono' placeholder="Ingrese el numero telefono" value="{{ old('telefono') }}" required>
						    </div>
						    <div class="form-group">
						        <label>Ingrese el codigo postal</label>
						        <input class="form-control" name='codigo' id='codigo' placeholder="Ingrese la codigo" value="{{ old('codigo') }}" required>
						    </div>
						    <div class="form-group">
				                <label>Observaciones</label>
				                <textarea class="form-control" name="observaciones" id="observaciones" rows="3" required>
				                	{{ old('observaciones') }}
				                </textarea>
				            </div>
						</div>
						<div class="col-md-12">
					    	<button type="submit" style="float: right;" class="btn btn-success btn-md">Guardar <i class="fa fa-check"></i>
					    </div>
				    </div>
				</form>

			</div>
        </div>
    </div>
</div>

@endif

@endsection