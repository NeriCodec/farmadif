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
        $receta = $request->file('receta');
        $request->receta->store('public/recetas');

        $verificacionMedicamento = new VerificacionMedicamento();
    	$verificacionMedicamento->receta_medica = "'" . 'public/recetas/' . $request->receta->hashName() . "'";
        $verificacionMedicamento->tipo_solicitud = "En proceso";
        $verificacionMedicamento->descripcion = $request->get('descripcion');
        $verificacionMedicamento->diagnostico = $request->get('diagnostico');
    	$verificacionMedicamento->save();
	}

    public static function actualizarTipoSolicitud($verificacionMedicamento)
    {
        $verificacionMedicamento = VerificacionMedicamento::find($verificacionMedicamento);
        $verificacionMedicamento->tipo_solicitud = "Realizada";
        $verificacionMedicamento->save();
    }
}