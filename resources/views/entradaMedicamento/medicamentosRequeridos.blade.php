<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Selecionar medicamento
                </div>
                
                <form class="navbar-form navbar-left pull-left" action="{{ route('ruta_nuevo_registrar_medicamento', ['id' => $donador->id_donador]) }}" method="get">
          <button type="submit" class="btn btn-default">Registrar nuevo medicamento</button>
        </form>
         <form class="navbar-form navbar-left pull-right" action="{{ route('ruta_buscar_medicamento_seleccionar', ['id' => $donador->id_donador]) }}" method="get">
          <div class="form-group">
            <input type="text" class="form-control" name="medicamento" placeholder="Buscar">
          </div>
          <button type="submit" class="btn btn-default">Buscar</button>
        </form>
                
                <div class="panel-body">
                     <table width="100%" class="table table-striped table-hover">
                    <thead>
                        <tr>
                                <th>Nombre comercial</th>
                                <th>Nombre compuesto</th>
                                <th>No. etiqueta</th>
                                <th>No. folio</th>
                                <th>Fecha caducidad</th>
                                <th>Dosis</th>
                                <th>Solucion/Tableta</th>
                                <th>Contenido</th>
                                <th>Seleccionar</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($medicamentoRequerido as $requerido)
                            <tr>
                                <th>{{ $requerido->nombre_comercial }}</th>
                                <th>{{ $requerido->nombre_compuesto }}</th>
                                <th>{{ $requerido->num_etiqueta }}</th>
                                <th>{{ $requerido->num_folio }}</th>
                                <th>{{ $requerido->mes_caducidad }}</th>
                                <th>{{ $requerido->dosis }}</th>
                                <th>{{ $requerido->solucion_tableta }}</th>
                                <th>{{ $requerido->tipo_contenido }}</th>
                                <th>
                                  <center>
                                    <a href="{{ route('ruta_nuevo_existente_registrar_medicamento', ['idDonador' => $donador->id_donador,'idMedicamento' => $requerido->id_medicamento]) }}">
                                         <button class="btn btn-success btn-small ">
                                               <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                         </button> 
                                    </a>
                                  </center>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
                </div>
                <center></center>
            </div>
        </div>
    </div>
