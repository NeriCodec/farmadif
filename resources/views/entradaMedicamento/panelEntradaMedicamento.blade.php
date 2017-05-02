@extends('layouts.app')

@section('content')

<table width="100%" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Domicilio</th>
            <th>No. telefonico</th>
            <th>Codigo postal</th>
            <th>Fecha de registro</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $donador->nombre }}</td>
            <td>{{ $donador->domicilio }}</td>
            <td>{{ $donador->num_telefonico }}</td>
            <td>{{ $donador->codigo_postal }}</td>
            <td>{{ $donador->fecha_registro }}</td>
        </tr>
    </tbody>
</table>

<div class="panel panel-default">
            <div class="panel-heading">
                Entrada de medicamento
            </div>
       <div class="panel-body">
			<!--inicia el cuerpo-->
			<div class="row">
				<div class="col-md-12">
					<label>Nombre:</label><label> nombre</label>
				</div>
			</div>
			</br>
			<div class="row">
				<form action="#">
					<div class="col-md-6">
						<div class="form-horizontal">
							<label>Nombre del copuesto</label>
							<input type="text" class="form-control" placeholder="Nombre del compuesto">
							<label>Nombre comercial</label>
							<input type="text" class="form-control" placeholder="Nombre comercial">
							<label>Nro de etiqueta</label>
							<input type="text" class="form-control" placeholder="Nro de etiqueta" >
							<label>Nro de folio</label>
							<input type="text" class="form-control" placeholder="Nro de folio">
							<label>Cantidad</label>
							<input type="text" class="form-control" placeholder="Ingrese la cantidad">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-horizontal">
							<label>Fecha de caducidad</label>
							<input type="date" class="form-control">
							<label>Tipo de precentacion</label>
							<select class="form-control" name="precentacion">
								<option value="solucion">Solucion</option>
								<option value="tabletas">Tabletas</option>
							</select>
							
							<div class="col-md-5">
								<label>Tipo de medida</label>
								</br>
								<label class="radio-inline">
								 <input type="radio" name="medida" value="ml"> ml
								</label>
								<label class="radio-inline">
									 <input type="radio" name="medida" value="gr"> gr
								</label>
							</div>
							</br>
							</br>
							</br>
							</br>	
							<div class="col-md-5">
								<input type="submit" class="btn btn-default" value="Guardar">
							</div>
							
						</div>
					</div>
					
				</form>
			</div>
			<!--modulo de busqueda de medicamento-->
			</br>
			<div class="row">
				<div class="col-md-12">
					<form action="" class="form-vertical">
						<label>Buscar medicamento por</label>
						<label class="radio-inline">
							<input type="radio" name="buscarPorMedicamento" value="gr"> Compuesto
						</label>
						<label class="radio-inline">
							<input type="radio" name="buscarPorMedicamento" value="gr"> Nombre comercial
						</label>
						<label class="radio-inline">
							<input type="radio" name="buscarPorMedicamento" value="gr"> No. de folio
						</label>
						<div class="col-md-4 col-md-offset-8">
							
						</div>
						<button type="submit" class="btn btn-default">Buscar</button>
					</form>
					
				</div>
			</div>

			<!--termina modulo de busqueda de medicamento-->

			<!--termina le cuerpo-->
       </div>
</div>



@endsection