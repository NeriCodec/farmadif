@extends('templates.panel')
@section('panel-contenedor')

@if(count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

<form action="{{ route('ruta_beneficiario_registrar') }}" method="post">
	{{ csrf_field() }}
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
		        <label>Ingrese el nombre</label>
		        <input class="form-control" name='nombre' id='nombre' placeholder="Ingrese el nombre" value="{{ old('nombre') }}">
		    </div>
		    <div class="form-group">
		        <label>Ingrese el apellido paterno</label>
		        <input class="form-control" name='ap_paterno' id='ap_paterno' placeholder="Ingrese el apellido paterno" value="{{ old('ap_paterno') }}">
		    </div>
		    <div class="form-group">
		        <label>Ingrese el apellido materno</label>
		        <input class="form-control" name='ap_materno' id='ap_materno' placeholder="Ingrese el apellido materno" value="{{ old('ap_materno') }}">
		    </div>
		    <div class="form-group">
		        <label>Ingrese la fecha de nacimiento</label>
		        <div class="row">
		          <div class="col-xs-4">
		            <select class="form-control" name="dia">
		              <?php
		                  for($i=1; $i<=31; $i++) {
		                     echo "<option value=$i>$i</option>";
		                  }
		              ?>
		            </select>
		          </div>
		          <div class="col-xs-4">
		            <select class="form-control" name="mes">
		              <?php
		                  for($i=1; $i<=12; $i++) {
		                      switch($i) {
		                       case 1:
		                          $mestexto = "enero";
		                          break;
		                        case 2:
		                          $mestexto = "febrero";
		                          break;
		                        case 3:
		                          $mestexto = "marzo";
		                          break;
		                        case 4:
		                          $mestexto = "abril";
		                          break;
		                        case 5:
		                          $mestexto = "mayo";
		                          break;
		                        case 6:
		                          $mestexto = "junio";
		                          break;
		                        case 7:
		                          $mestexto = "julio";
		                          break;
		                        case 8:
		                          $mestexto = "agosto";
		                          break;
		                        case 9:
		                          $mestexto = "septiembre";
		                          break;
		                        case 10:
		                          $mestexto = "octubre";
		                          break;
		                        case 11:
		                          $mestexto = "noviembre";
		                          break;
		                        case 12:
		                          $mestexto = "diciembre";
		                          break;
		                    }
		                     echo "<option value=$i>$mestexto</option>";
		                  }
		              ?>
		            </select>
		          </div>
		          <div class="col-xs-4">
		            <select class="form-control" name="anio">

		              <?php
		                  for($i=date("Y"); $i>=1905; $i--) {
		                     echo "<option value=$i>$i</option>";
		                  }
		              ?>
		            </select>
		          </div>
		        </div>
		    </div>
		    <div class="form-group">
		        <label>Ingrese el domicilio</label>
		        <input class="form-control" name='domicilio' id='domicilio' placeholder="Ingrese el domicilio" value="{{ old('domicilio') }}">
		    </div>
		    <div class="form-group">
		        <label>Ingrese la comunidad</label>
		        <input class="form-control" name='comunidad' id='comunidad' placeholder="Ingrese la comunidad" value="{{ old('comunidad') }}">
		    </div>
		</div>
		<div class="col-md-12">
	    	<button type="submit" style="float: right;" class="btn btn-success btn-md">Guardar <i class="fa fa-check"></i>
	    </div>
    </div>
</form>
@endsection