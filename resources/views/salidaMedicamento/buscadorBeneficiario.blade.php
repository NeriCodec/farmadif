 <form class="navbar-form navbar-left pull-right" action="{{ route('ruta_salida_medicamentos') }}" method="get">
	<div class="form-group">
		<input type="text" class="form-control" name="beneficiario" placeholder="Buscar">
	</div>
	<button type="submit" class="btn btn-default">Buscar</button>
</form>