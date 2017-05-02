<table width="100%" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Domicilio</th>
            <th>No. telefonico</th>
            <th>Codigo postal</th>
            <th>Fecha de registro</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $donador->nombre }}</td>
            <td>{{ $donador->domicilio }}</td>
            <td>{{ $donador->num_telefonico }}</td>
            <td>{{ $donador->codigo_postal }}</td>
            <td>{{ $donador->fecha_registro }}</td>
        </tr>
    </tbody>
</table>