<?php

namespace App\Http\Controllers;

use App\Beneficiario;
use Illuminate\Http\Request;


class SalidaMedicamentoController extends Controller
{
    public function index()
    {
    	$beneficiarios = Beneficiario::all();
    	return view('salidaMedicamento.panel')->with('beneficiarios', $beneficiarios);
    }

    public function salida($id)
    {
    	$beneficiario = Beneficiario::find($id);
    	return view('salidaMedicamento.panelSalidaMedicamento')->with('beneficiario', $beneficiario);
    }
}
