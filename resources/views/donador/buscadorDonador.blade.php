<form class="navbar-form navbar-left pull-right" action="{{ route('ruta_donadores') }}" method="get">
      <div class="form-group">
        <input type="text" class="form-control" name="donador" placeholder="Buscar">
      </div>
      <button type="submit" class="btn btn-default">Buscar</button>
      <a  class="btn btn-warning" href="{{ route('ruta_donador_registro') }}">Registrar</a>
</form>