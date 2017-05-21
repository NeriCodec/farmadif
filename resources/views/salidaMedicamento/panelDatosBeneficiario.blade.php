<table width="100%" class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Domicilio</th>
            <th>Comunidad</th>
            <th>Fecha de nacimiento</th>
            <th>Fecha de registro</th>
            <th>Fotografia</th>
            <th>INE/IFE</th>
        </tr>
    </thead>
    <tbody>
        <tr class="warning">
            <td>{{ $beneficiario->nombre . " " . $beneficiario->ap_paterno . " " .$beneficiario->ap_materno}}</td>
            <td>{{ $beneficiario->domicilio}}</td>
            <td>{{ $beneficiario->comunidad}}</td>
            <td>{{ $beneficiario->fecha_nacimiento}}</td>
            <td>{{ $beneficiario->fecha_registro}}</td>
            @if(strlen($beneficiario->fotografia) > 0)
            <td>SI</td>
            @else
            <td>NO</td>
            @endif
            @if(strlen($beneficiario->identificacion) > 0)
            <td>SI</td>
            @else
            <td>NO</td>
            @endif
        </tr>
    </tbody>
</table>