<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Selecionar medicamento
                </div>
                
                <div class="navbar-form navbar-left pull-right">
                    <div class="form-group">
                        <input type="text" class="form-control" name="medicamento" id="medicamento" placeholder="Buscar">
                    </div>
                    <button type="button" class="btn btn-default" id="buscarEntradaMedicamento">Buscar</button>
                </div>
                

                <div class="panel-body">
                     <table width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                                <th>Nombre comercial</th>
                                <th>Nombre compuesto</th>
                                <th>No. etiqueta</th>
                                <th>No. folio</th>
                                <th>Fecha caducidad</th>
                                <th>Cantidad</th>
                                <th>Solucion/Tableta</th>
                                <th>Contenido</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($medicamentos as $medicamento)
                            <tr>
                                <th>{{ $medicamento->nombre_comercial }}</th>
                                <th>{{ $medicamento->nombre_compuesto }}</th>
                                <th>{{ $medicamento->num_etiqueta }}</th>
                                <th>{{ $medicamento->num_folio }}</th>
                                <th>{{ $medicamento->fecha_caducidad }}</th>
                                <th>{{ $medicamento->cantidad }}</th>
                                <th>{{ $medicamento->solucion_tableta }}</th>
                                <th>{{ $medicamento->tipo_contenido }}</th>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
                </div>
            </div>
        </div>
        <center>{{ $medicamento->links() }}</center>
    </div>