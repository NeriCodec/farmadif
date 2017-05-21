@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Detalles de beneficiario</h4>
            </div>
             @include('beneficiario.datos')
             <div class="panel-heading">
                <h4>Medicamentos donados</h4>
            </div>
           

            <div style="height:500px; overflow: auto;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre comercial</th>
                        <th>Nombre compuesto</th>
                        <th>Descripcion</th>
                        <th>Diagnostico</th>
                        <th>No. etiqueta</th>
                        <th>No. folio</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($detalles as $medicamento)
                    <tr>
                        <td>{{ $medicamento->nombre_comercial }}</td>
                        <td>{{ $medicamento->nombre_compuesto }}</td>
                        <td>{{ $medicamento->descripcion }}</td>
                        <td>{{ $medicamento->diagnostico }}</td>
                        <td>{{ $medicamento->num_etiqueta }}</td>
                        <td>{{ $medicamento->num_folio }}</td>

                        <td>
                         <center>
                            {{-- <form action="" method="post"> --}}
                                {{-- {{ csrf_field() }} --}}
                            <button type="button" class="btn btn-danger btn-small btn-agregar" data-toggle="modal" data-target="#confirmacion{{ $medicamento->num_folio }}">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </button>
                            {{-- </form> --}}
                        </center>

                        </td> 

                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="confirmacion{{ $medicamento->num_folio }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Esta seguro de eliminar</h4>
                          </div>
                          <div class="modal-body">
                            Eliminar este medicamento <b>{{ $medicamento->nombre_comercial }}</b>, una vez realizado esto, el medicamento sera liberado en el inventario.
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Confirmar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
   
@endsection