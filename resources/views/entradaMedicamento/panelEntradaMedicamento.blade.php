@extends('layouts.app')

@section('content')
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
				<form action="#" class="">
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
							
						</div>
					</div>
					
				</form>
			</div>

			<!--termina le cuerpo-->
       </div>
</div>



@endsection