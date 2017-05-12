<form class="navbar-form navbar-left pull-right" action="{{ route('ruta_verificar_medicamento', [ 'idBeneficiario' => $beneficiario->id_beneficiario]) }}" method="get">
    <div class="form-group">
        <input type="text" class="form-control" name="medicamento" placeholder="Buscar">
    </div>
    <button type="submit" class="btn btn-info">
    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
    	Buscar
    </button>
</form>