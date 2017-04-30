<table width="100%" class="table table-striped table-bordered table-hover">
    <thead>
        <tr style="background-color: #fff;">
            <th>Nombre</th>
            <th>Domicilio</th>
            <th>Comunidad</th>
            <th>Fecha de nacimiento</th>
            <th>Fecha de registro</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $beneficiario->nombre . ' ' . $beneficiario->ap_paterno . ' ' . $beneficiario->ap_materno }}</td>
            <td>{{ $beneficiario->domicilio }}</td>
            <td>{{ $beneficiario->comunidad }}</td>
            <td>{{ $beneficiario->fecha_nacimiento }}</td>
            <td>{{ $beneficiario->fecha_registro }}</td>
        </tr>
    </tbody>
</table>