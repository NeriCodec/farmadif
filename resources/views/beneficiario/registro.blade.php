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

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Registrar beneficiario
            </div>
            <div class="panel-body">

				<form action="{{ route('ruta_beneficiario_registrar') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
						        <label>Ingrese el nombre (s)</label>
						        <input class="form-control" name='nombre' required id='nombre' placeholder="Ingrese el nombre" value="{{ old('nombre') }}">
						    </div>
						    <div class="form-group">
						        <label>Ingrese el apellido paterno</label>
						        <input class="form-control" name='ap_paterno' required id='ap_paterno' placeholder="Ingrese el apellido paterno" value="{{ old('ap_paterno') }}">
						    </div>
						    <div class="form-group">
						        <label>Ingrese el apellido materno</label>
						        <input class="form-control" name='ap_materno' required id='ap_materno' placeholder="Ingrese el apellido materno" value="{{ old('ap_materno') }}">
						    </div>
						    <div class="form-group">
						        <label>Ingrese la fecha de nacimiento</label>
						        <div class="row">
						          <div class="col-xs-4">
						            <select class="form-control" name="dia" required>
						            	<option value="">Dia</option>
						              <?php
						                  for($i=1; $i<=31; $i++) {
						                     echo "<option value=$i>$i</option>";
						                  }
						              ?>
						            </select>
						          </div>
						          <div class="col-xs-4">
						            <select class="form-control" name="mes" required>
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
						          </div>
						          <div class="col-xs-4">
						            <select class="form-control" name="anio" required>
									 <option value="">Año</option>
						              <?php
						                  for($i=date("Y"); $i>=1950; $i--) {
						                     echo "<option value=$i>$i</option>";
						                  }
						              ?>
						            </select>
						          </div>
						        </div>
						    </div>

						    <div class="form-group">
						        <label>Ingrese el domicilio</label>
						        <input class="form-control" name='domicilio' required id='domicilio' placeholder="Ingrese el domicilio" value="{{ old('domicilio') }}">
						    </div>

						    <div class="form-group">
						        <label>Ingrese la comunidad</label>
						        <input class="form-control" name='comunidad' required id='comunidad' placeholder="Ingrese la comunidad" value="{{ old('comunidad') }}">
						    </div>

						     <div class="form-group">
						        <label>Fotografia</label>
						        <input type="file"  name="fotografia" >
						    </div>

						    <div class="form-group">
						        <label>Identificacion</label>
						        <input type="file"  name="identificacion">
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


@endsection