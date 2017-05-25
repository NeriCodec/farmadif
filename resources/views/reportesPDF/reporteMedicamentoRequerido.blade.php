<style type="text/css">
    .centrar-tabla{
        align-content: center;
        margin-left: 0px;
        margin-right: 10px;
    }
    .encabezado{
        align-content: center;
    }
    .logoderecho{
        
        width: 100px;
        height: 100px;
    }
    .logoizquierdo{
        width: 100px;
        height: 100px;
    }
    .separacionArriba{
        margin-bottom: 100px;
    }
    .separacionAbajo{
        margin-top: 30px;
    }

</style>





<page style="font: arial;" backtop="30mm" backbottom="10mm" backleft="5mm" backright="0mm">
<page_header>

    <table style="width: 100%; border: solid 0px black;">
        <tr>
            <td style="text-align: left;    width: 33%"><img src="img/logoReporteDIF.jpg" class="logoizquierdo" ></td>
            <td style="text-align: center;    width: 34%"><h1 align="center">Inventario FARMADIF</h1></td>
            <td style="text-align: right;    width: 34%"><img src="img/logoHidalgo.jpg" class="logoderecho"><?php //echo date('d/m/Y'); ?></td>
        </tr>
    </table>

</page_header>
<page_footer>
    <table style="width: 100%; border: solid 0px black;">
        <tr>
            <td style="text-align: left;    width: 50%"><?php echo date('d/m/Y')."  "; ?>Huichapan,Hidalgo</td>
            <td style="text-align: right;    width: 50%">pagina [[page_cu]]/[[page_nb]]</td>
        </tr>
    </table>
</page_footer>


<div class="centrar-tabla" >
    <table border="1px" cellspacing="0px" style="width:auto; height: auto;">
    <thead>
        <tr>
            {{-- <th>ID</th> --}}
            <th>Nombre comercial</th>
            <th>Nombre compuesto</th>
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
            <td>{{ $medicamento->dosis }}</td>
            <td>{{ $medicamento->solucion_tableta }}</td>
            <td>{{ $medicamento->tipo_contenido }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>


</page>

