<?php

namespace App\Http\Database;

use App\Medicamento;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegistrarMedicamentoRequest;

class MedicamentoDatabase
{
    /**
    * Permite guardar en la base de datos el donador
    * @param RegistrarDonadorRequest  $request
    * @return void
    */
	public static function guardarMedicamento(RegistrarMedicamentoRequest $request)
	{
        $Medicamento = new Medicamento();
        $Medicamento->nombre_compuesto = $request->get('nombre_compuesto');
    	$Medicamento->nombre_comercial = $request->get('nombre_comercial');
        $Medicamento->num_etiqueta = $request->get('nro_etiqueta');
        $Medicamento->num_folio = $request->get('nro_folio');
        $Medicamento->mes_caducidad = $request->get('mes_caducidad');
        $Medicamento->anio_caducidad = $request->get('anio_caducidad');
        $Medicamento->cantidad = $request->get('cantidad_re');
        $Medicamento->solucion_tableta = $request->get('precentacion');
        $Medicamento->tipo_contenido = $request->get('medida');
        $Medicamento->fecha_registro = date("Y-m-d");
        $Medicamento->save();

	}
}