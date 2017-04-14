<?php

namespace App\Http\Database;

use App\Beneficiario;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegistrarBeneficiarioRequest;

class BeneficiarioDatabase
{
	public static function guardarBeneficiario(RegistrarBeneficiarioRequest $request)
	{
        $beneficiario = new Beneficiario();
    	$fecha = $request->get('anio') . '-' . $request->get('mes') . '-' . $request->get('dia');
    	$beneficiario->nombre = $request->get('nombre');
    	$beneficiario->ap_paterno = $request->get('ap_paterno');
    	$beneficiario->ap_materno = $request->get('ap_materno');
    	$beneficiario->fecha_nacimiento = $fecha;
    	$beneficiario->domicilio = $request->get('domicilio');
    	$beneficiario->comunidad = $request->get('comunidad');
    	$beneficiario->fecha_registro = date("Y-m-d h:m:s");
    	$beneficiario->tb_usuarios_id_usuario = Auth::id();
    	$beneficiario->save();
	}
}