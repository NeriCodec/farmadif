<table width="100%" class="table table-striped">
    <thead>
        <tr class="warning">
            <th>Nombre</th>
            <th>Domicilio</th>
            <th>Comunidad</th>
            <th>Fotografia</th>
            <th>INE/IFE</th>
        </tr>
    </thead>
    <tbody>
        <tr class="warning">
            <td>{{ $beneficiario->nombre . " " . $beneficiario->ap_paterno . " " .$beneficiario->ap_materno}}</td>
            <td>{{ $beneficiario->domicilio}}</td>
            <td>{{ $beneficiario->comunidad}}</td>
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