@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Medicamentos registrados
                </div>

            
            <form class="navbar-form navbar-left pull-right" action="{{ route('ruta_imprimir_inventario_pdf') }}" method="get" target="_blank">
                <label >  Desde </label>
                <input type="month" name="fechaIni" class="form-control" />
                <label >  a </label>
                <input type="month" name="fechaFin" class="form-control" />
                <button type="submit" class="btn btn-default">Imprimir reporte PDF</button>
            </form>


                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="tmedicamento">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
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
                                <td>{{ $medicamento->nombre_comercial }}</td>
                                <td >{{ $medicamento->nombre_compuesto }}</td>
                                <td>{{ $medicamento->num_etiqueta }}</td>
                                <td>{{ $medicamento->num_folio }}</td>

                                @if($medicamento->mes_caducidad <= 9)
                                    <td>{{ "0" . $medicamento->mes_caducidad . " / " . $medicamento->anio_caducidad}}</td>
                                @else
                                    <td>{{ $medicamento->mes_caducidad . " / " . $medicamento->anio_caducidad}}</td>
                                @endif
                                
                                <td>{{ $medicamento->cantidad }}</td>
                                <td>{{ $medicamento->solucion_tableta }}</td>
                                <td>{{ $medicamento->tipo_contenido }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <center>{{ $medicamentos->links() }}</center>
                </div>
            </div>
            
        </div>
    </div>
@endsection