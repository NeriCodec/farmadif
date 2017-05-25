@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Donadores registrados
                </div>
            <form class="navbar-form navbar-left pull-left" action="{{ route('ruta_imprimir_inventario_requerido_pdf') }}" method="get" target="_blank">
                <label >  Desde </label>
                <input type="month" name="fechaIni" class="form-control" required />
                <label >  a </label>
                <input type="month" name="fechaFin" max="<?php echo date('Y-m');?>" class="form-control" required />
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
                                <th>Dosis</th>
                                <th>Solucion/Tableta</th>
                                <th>Contenido</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($medicamentos as $medicamento)
                            <tr>
                                <td>{{ $medicamento->nombre_comercial }}</td>
                                <td>{{ $medicamento->nombre_compuesto }}</td>
                                <td></td>
                                <td></td>

                                    <td></td>
                                <td>{{ $medicamento->dosis }}</td>
                                <td>{{ $medicamento->solucion_tableta }}</td>
                                <td>{{ $medicamento->tipo_contenido }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <center></center>
                </div>
            </div>
            
        </div>
    </div>
@endsection