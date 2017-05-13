<?php

namespace App\Http\Controllers;

use App\Beneficiario;
use Illuminate\Http\Request;

class SolicitudPendienteController extends Controller
{
    public function mostrarSolicitud(Request $request)
    {
    	$beneficiario = Beneficiario::find($request->idDonador);
    	return view('solicitudPendiente.principal')->with('beneficiario', $beneficiario);
    }

    public function agregarMedicamento()
    {
    	
    }

    public function eliminarMedicamento()
    {
    	
    }
}
