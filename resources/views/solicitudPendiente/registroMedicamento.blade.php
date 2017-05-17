
@if(count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

<div class="row" style="padding: 20px;">
	<form action="{{ route('ruta_solicitud_guardar_medicamento', ['idBeneficiario' => $beneficiario->id_beneficiario]) }}" method="post">
		{{ csrf_field() }}
		<div class="col-md-12">

			<div class="form-group">
				<label>Nombre comercial</label>
				<input type="text" class="form-control" name="nombre_comercial" placeholder="Nombre comercial" value="{{ old('nombre_comercial') }}">
			</div>

			<div class="form-group">
				<label>Nombre del compuesto</label>
				<input type="text" class="form-control" name="nombre_compuesto" value="{{ old('nombre_compuesto') }}" placeholder="Nombre del compuesto">
			</div>
			
			<div class="form-group">

				<div class="row">
					<div class="col-md-8">
						<label>Dosis</label>
						<input type="number" class="form-control" name="dosis" value="{{ old('dosis') }}" placeholder="Ingrese la dosis">
					</div>
					<div class="col-md-4" style="margin-top: 30px;">
						<label>Tipo de medida: </label>
						<label class="radio-inline">
						 <input type="radio" name="medida" value="ml"> ml
						</label>
						<label class="radio-inline">
							 <input type="radio" name="medida" value="gr"> gr
						</label>
					</div>
				</div>
			
			</div>

			<div class="form-group">
				<label>Tipo de precentacion</label>
				<select class="form-control" name="precentacion">
					<option value="Solucion">Solucion</option>
					<option value="Tabletas">Tabletas</option>
				</select>
			</div>

		
			<input type="submit" class="btn btn-success pull-right" value="Agregar">
			
		</div>
		
	</form>	
</div>