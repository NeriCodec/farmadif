@extends('layouts.app')

@section('content')

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
							<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
						        <label>Ingrese el nombre (s)</label>
						        <input class="form-control" name='nombre' id='nombre' placeholder="Ingrese el nombre" value="{{ old('nombre') }}">
						        @if ($errors->has('nombre'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                            	@endif
						    </div>
						    <div class="form-group{{ $errors->has('ap_paterno') ? ' has-error' : '' }}">
						        <label>Ingrese el apellido paterno</label>
						        <input class="form-control" name='ap_paterno' id='ap_paterno' placeholder="Ingrese el apellido paterno" value="{{ old('ap_paterno') }}">
						        @if ($errors->has('ap_paterno'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ap_paterno') }}</strong>
                                </span>
                            	@endif
						    </div>
						    <div class="form-group{{ $errors->has('ap_materno') ? ' has-error' : '' }}">
						        <label>Ingrese el apellido materno</label>
						        <input class="form-control" name='ap_materno' id='ap_materno' placeholder="Ingrese el apellido materno" value="{{ old('ap_materno') }}">
						        @if ($errors->has('ap_materno'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ap_materno') }}</strong>
                                </span>
                            	@endif
						    </div>
						    <div class="form-group{{ $errors->has('dia') ? ' has-error' : '' }}">
						        <label>Ingrese la fecha de nacimiento</label>
						        <div class="row">
						          <div class="col-xs-4">
						            <select class="form-control" name="dia" >
						            	<option value="">Dia</option>
						              <?php
						                  for($i=1; $i<=31; $i++) {
						                     echo "<option value=$i>$i</option>";
						                  }
						              ?>
						            </select>
						            @if ($errors->has('dia'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('dia') }}</strong>
	                                </span>
	                            	@endif
						          </div>
						          <div class="col-xs-4">
						            <select class="form-control{{ $errors->has('mes') ? ' has-error' : '' }}" name="mes">
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
						            @if ($errors->has('mes'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('mes') }}</strong>
	                                </span>
	                            	@endif
						          </div>
						          <div class="col-xs-4">
						            <select class="form-control{{ $errors->has('anio') ? ' has-error' : '' }}" name="anio">
									 <option value="">Año</option>
						              <?php
						                  for($i=date("Y"); $i>=1950; $i--) {
						                     echo "<option value=$i>$i</option>";
						                  }
						              ?>
						            </select>
						             @if ($errors->has('anio'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('anio') }}</strong>
	                                </span>
	                            	@endif
						          </div>
						        </div>
						    </div>

						    <div class="form-group{{ $errors->has('domicilio') ? ' has-error' : '' }}">
						        <label>Ingrese el domicilio</label>
						        <input class="form-control" name='domicilio' id='domicilio' placeholder="Ingrese el domicilio" value="{{ old('domicilio') }}">
						        @if ($errors->has('domicilio'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('domicilio') }}</strong>
                                </span>
                            	@endif
						    </div>

						    <div class="form-group{{ $errors->has('comunidad') ? ' has-error' : '' }}">
						        <label>Ingrese la comunidad</label>
						        <input class="form-control" name='comunidad' id='comunidad' placeholder="Ingrese la comunidad" value="{{ old('comunidad') }}">
						        @if ($errors->has('comunidad'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('comunidad') }}</strong>
                                </span>
                            	@endif
						    </div>

						    <div class="row">
						    	<div class="col-md-6">
						    		<div class="form-group{{ $errors->has('usuario') ? ' has-error' : '' }}">
								        <label>Ingrese el usuario</label>
								        <input class="form-control" name='usuario' id='usuario' placeholder="Ingrese el usuario" value="{{ old('usuario') }}">
								        @if ($errors->has('usuario'))
		                                <span class="help-block">
		                                    <strong>{{ $errors->first('usuario') }}</strong>
		                                </span>
		                            	@endif
								    </div>
						    	</div>
						    	<div class="col-md-6">
						    		<div class="form-group{{ $errors->has('contrasena') ? ' has-error' : '' }}">
								        <label>Ingrese la contraseña</label>
								        <input class="form-control" name='contrasena' id='contrasena' placeholder="Ingrese la contraseña" value="{{ old('contrasena') }}">
								        @if ($errors->has('contrasena'))
		                                <span class="help-block">
		                                    <strong>{{ $errors->first('contrasena') }}</strong>
		                                </span>
		                            	@endif
								    </div>
						    	</div>
						    </div>

						    

						    

						    <div class="row">
						    	<div class="col-md-6">
						    		<div class="form-group{{ $errors->has('fotografia') ? ' has-error' : '' }}">
								        <label>Fotografia</label>
								        <input type="file"  name="fotografia" >
								        @if ($errors->has('fotografia'))
		                                <span class="help-block">
		                                    <strong>{{ $errors->first('fotografia') }}</strong>
		                                </span>
		                            	@endif
								    </div>
						    	</div>

						    	<div class="col-md-6">
						 			<div class="form-group{{ $errors->has('identificacion') ? ' has-error' : '' }}">
								        <label>Identificacion</label>
								        <input type="file"  name="identificacion">
								        @if ($errors->has('identificacion'))
		                                <span class="help-block">
		                                    <strong>{{ $errors->first('identificacion') }}</strong>
		                                </span>
		                            	@endif
								    </div>
						    	</div>
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