<?php

namespace App\Http\Database;

use Illuminate\Http\Request;
use App\SolicitudMedicamento;
use Illuminate\Support\Facades\Auth;

class VerificacionSalidaDatabase
{
    /**
    * Permite guardar en la base de datos la solicitud del medicamento
    * @param Request  $request
    * @return void
    */
	public static function guardarVerificacionMedicamento(Request $request)
	{
        $receta = $request->file('receta');
        $request->receta->store('public/recetas');

        $solicitudMedicamento = new SolicitudMedicamento();
    	$solicitudMedicamento->receta_medica = "'" . 'public/recetas/' . $request->receta->hashName() . "'";
        $solicitudMedicamento->tipo_solicitud = "En proceso";
        $solicitudMedicamento->descripcion = $request->get('descripcion');
        $solicitudMedicamento->diagnostico = $request->get('diagnostico');
    	$solicitudMedicamento->save();
	}

    public static function actualizarTipoSolicitud($verificacionMedicamento)
    {
        $solicitudMedicamento = SolicitudMedicamento::find($verificacionMedicamento);
        $solicitudMedicamento->tipo_solicitud = "Realizada";
        $solicitudMedicamento->save();
    }
}