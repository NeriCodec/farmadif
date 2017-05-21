 <form class="navbar-form navbar-left pull-right" action="{{ route('ruta_entrada_medicamentos') }}" method="get">

 	<div class="row">
		<div class="col-lg-8">
			<div class="input-group">
			  <input type="text" class="form-control" name="donador" placeholder="Buscar donador">
			  <span class="input-group-btn">
			    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
			  </span>
			</div>
		</div>
		<div class="col-lg-4">
			<a  class="btn btn-success" href="{{ route('ruta_donador_registro') }}">Registrar</a>
		</div>
    </div>
   
</form>