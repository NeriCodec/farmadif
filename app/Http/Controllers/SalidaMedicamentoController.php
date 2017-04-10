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
}
