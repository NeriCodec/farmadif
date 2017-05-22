<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Medicamentos Donados
                </div>
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
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($medicamentos as $medicamento)
                                <tr>
                                    <th>{{ $medicamento->nombre_comercial }}</th>
                                    <th>{{ $medicamento->nombre_compuesto }}</th>
                                    <th>{{ $medicamento->num_etiqueta }}</th>
                                    <th>{{ $medicamento->num_folio }}</th>
                                    <th>{{ $medicamento->mes_caducidad }}</th>
                                    <th>{{ $medicamento->dosis }}</th>
                                    <th>{{ $medicamento->solucion_tableta }}</th>
                                    <th>{{ $medicamento->tipo_contenido }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
                </div>
                <center></center>
            </div>
        </div>
    </div>