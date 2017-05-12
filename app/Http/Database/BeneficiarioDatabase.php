<?php

namespace App\Http\Database;

use App\Beneficiario;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegistrarBeneficiarioRequest;

class BeneficiarioDatabase
{
    /**
    * Permite guardar en la base de datos el beneficiario
    * @param RegistrarBeneficiarioRequest  $request
    * @return void
    */
	public static function guardarBeneficiario(RegistrarBeneficiarioRequest $request)
	{

        $identificacion = $request->file('identificacion');
        $request->identificacion->store('public/identificaciones');

        $fotografia = $request->file('fotografia');
        $request->fotografia->store('public/fotografias');
        
        $beneficiario = new Beneficiario();
    	$fecha = $request->get('anio') . '-' . $request->get('mes') . '-' . $request->get('dia');
    	$beneficiario->nombre = $request->get('nombre');
    	$beneficiario->ap_paterno = $request->get('ap_paterno');
    	$beneficiario->ap_materno = $request->get('ap_materno');
    	$beneficiario->fecha_nacimiento = $fecha;
    	$beneficiario->domicilio = $request->get('domicilio');
    	$beneficiario->comunidad = $request->get('comunidad');
    	$beneficiario->fecha_registro = date("Y-m-d h:m:s");
        $beneficiario->identificacion = "'" . 'public/identificaciones/' . $request->identificacion->hashName() . "'";
        $beneficiario->fotografia = "'" . 'public/fotografias/' . $request->fotografia->hashName() . "'";
    	$beneficiario->tb_usuarios_id_usuario = Auth::id();
    	$beneficiario->save();
	}
}