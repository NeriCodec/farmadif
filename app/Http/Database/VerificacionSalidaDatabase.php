<?php

namespace App\Http\Database;

use Illuminate\Http\Request;
use App\VerificacionMedicamento;
use Illuminate\Support\Facades\Auth;

class VerificacionSalidaDatabase
{
    /**
    * Permite guardar en la base de datos la verificacionMedicamento
    * @param Request  $request
    * @return void
    */
	public static function guardarVerificacionMedicamento(Request $request)
	{
        $verificacionMedicamento = new VerificacionMedicamento();
    	$verificacionMedicamento->receta_medica = $request->get('receta_medica');
    	$verificacionMedicamento->copia_ine = $request->get('ife_ine');
        $verificacionMedicamento->fotografia = $request->get('fotografia');
        $verificacionMedicamento->solicitud = $request->get('solicitud');
        $verificacionMedicamento->descripcion = $request->get('descripcion');
        $verificacionMedicamento->diagnostico = $request->get('diagnostico');
    	$verificacionMedicamento->save();
	}
}