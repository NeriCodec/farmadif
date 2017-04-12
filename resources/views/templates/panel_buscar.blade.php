<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="tabla_medicamento">
                    <thead>
                        <tr>
                            <th>nombre_comercial</th>
                            <th>Nombre compuesto</th>
                            <th>No. etiqueta</th>
                            <th>No. folio</th>
                            <th>Fecha de caducidad</th>
                            <th>Cantidad</th>
                            <th>Solucion/Tableta</th>
                            <th>ml/gr</th>
                            <th>Agregar</th>
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
                                <th>
                                    <center><a href="">
                                        <button class="btn btn-default btn-small">
                                            <i class="fa fa-plus fa-fw"></i> 
                                        </button>
                                    </a></center>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <center>{{ $medicamentos->links() }}</center>
</div>