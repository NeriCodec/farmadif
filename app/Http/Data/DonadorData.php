<?php

namespace App\Http\Data;

use App\Donador;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegistrarDonadorRequest;

class DonadorData
{
	public static function guardarDonador(RegistrarDonadorRequest $request)
	{
        $donador = new Donador();
    	$donador->nombre = $request->get('nombre');
        $donador->domicilio = $request->get('domicilio');
        $donador->num_telefonico = $request->get('telefono');
        $donador->codigo_postal = $request->get('codigo');
        $donador->observaciones = $request->get('observaciones');
        $donador->fecha_registro = date("Y-m-d h:m:s");
        $donador->tb_usuarios_id_usuario = Auth::id();
        $donador->save();
	}
}