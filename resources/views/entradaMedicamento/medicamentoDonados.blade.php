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
                                <th width="1%"></th>
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
                            @foreach($medicamentos as $medicamento)
                            <tr>
                                <td style="background-color: @if($medicamento->estatus=="requerido") #FFE161 @else #1F8A70 @endif ;">
                                </td>
                                <td>{{ $medicamento->nombre_comercial }}</td>
                                <td>{{ $medicamento->nombre_compuesto }}</td>
                                <td>{{ $medicamento->num_etiqueta }}</td>
                                <td>{{ $medicamento->num_folio }}</td>
                                <td>{{ $medicamento->mes_caducidad }}</td>
                                <td>{{ $medicamento->dosis }}</td>
                                <td>{{ $medicamento->solucion_tableta }}</td>
                                <td>{{ $medicamento->tipo_contenido }}</td>
                                <td>
                                  <center>
                                    <a href="{{ route('ruta_nuevo_existente_registrar_medicamento', ['idDonador' => $donador->id_donador,'idMedicamento' => $medicamento->id_medicamento]) }}">
                                         <button class="btn btn-success btn-small ">
                                               <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                         </button> 
                                    </a>
                                  </center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
                </div>
                <center>{{ $medicamentos->links() }}</center>
            </div>
        </div>
    </div>

