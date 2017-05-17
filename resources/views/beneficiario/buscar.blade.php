<form class="navbar-form navbar-left pull-right" action="{{ route('ruta_beneficiarios') }}" method="get">
      <div class="form-group">
        <input type="text" class="form-control" name="beneficiario" placeholder="Buscar">
      </div>
      <button type="submit" class="btn btn-default">Buscar</button>
   
      <a  class="btn btn-warning" href="{{ route('ruta_beneficiario_registro') }}">Registrar</a>
</form>