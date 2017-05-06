@extends('layouts.app')

@section('content')

<div class="panel panel-default">
            <div class="panel-heading">
                Datos del donador
            </div>
       <div class="panel-body">
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
	</div>
</div>

<div class="panel panel-default">
            <div class="panel-heading">
                Entrada de medicamento
            </div>
       <div class="panel-body">
			<!--inicia el cuerpo-->
			</br>
			<div class="row">
				<form action="{{ route('ruta_guardar_medicamento_entrada_nuevo') }}">
					<div class="col-md-6">
						<input type="hidden" name="idDonador" value="{{ $donador->id_donador }}">
						<div class="form-horizontal">
							<label>Nombre del copuesto</label>
							<input type="text" class="form-control" name="nombre_compuesto" placeholder="Nombre del compuesto">
							<label>Nombre comercial</label>
							<input type="text" class="form-control" name="nombre_comercial" placeholder="Nombre comercial">
							<label>Nro de etiqueta</label>
							<input type="text" class="form-control" name="nro_etiqueta" placeholder="Nro de etiqueta" >
							<label>Nro de folio</label>
							<input type="text" class="form-control" name="nro_folio" placeholder="Nro de folio">
							<label>Cantidad</label>
							<input type="text" class="form-control" name="cantidad_re" placeholder="Ingrese la cantidad">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-horizontal">

							<label>Fecha de caducidad</label>
							<select class="form-control" name="mes_caducidad" required>
						            	<option value="">Mes</option>
						              <?php
						                  for($i=1; $i<=12; $i++) {
						                      switch($i) {
						                       case 1:
						                          $mestexto = "Enero";
						                          break;
						                        case 2:
						                          $mestexto = "Febrero";
						                          break;
						                        case 3:
						                          $mestexto = "Marzo";
						                          break;
						                        case 4:
						                          $mestexto = "Abril";
						                          break;
						                        case 5:
						                          $mestexto = "Mayo";
						                          break;
						                        case 6:
						                          $mestexto = "Junio";
						                          break;
						                        case 7:
						                          $mestexto = "Julio";
						                          break;
						                        case 8:
						                          $mestexto = "Agosto";
						                          break;
						                        case 9:
						                          $mestexto = "Septiembre";
						                          break;
						                        case 10:
						                          $mestexto = "Octubre";
						                          break;
						                        case 11:
						                          $mestexto = "Noviembre";
						                          break;
						                        case 12:
						                          $mestexto = "Diciembre";
						                          break;
						                    }
						                     echo "<option value=$i>$mestexto</option>";
						                  }
						              ?>
						            </select>
									</br>
						            <select class="form-control" name="anio_caducidad" required>
									 <option value="">Año</option>
						              <?php
						                  for($i=date("Y"); $i<(date("Y")+10); $i++) {
						                     echo "<option value=$i>$i</option>";
						                  }
						              ?>
						            </select>
								
							<label>Tipo de precentacion</label>
							<select class="form-control" name="precentacion">
								<option value="Solucion">Solucion</option>
								<option value="Tabletas">Tabletas</option>
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

			<!--termina le cuerpo-->
       </div>
</div>

@include('entradaMedicamento.buscarMedicamentoEntrada')

@endsection