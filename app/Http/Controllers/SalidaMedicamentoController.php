<?php

namespace App\Http\Controllers;


use App\Beneficiario;
use App\Medicamento;
use Session;
use Illuminate\Http\Request;

class SalidaMedicamentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$beneficiarios = Beneficiario::paginate(10);
    	return view('salidaMedicamento.panel')->with('beneficiarios', $beneficiarios);
    }

    public function salida($id)
    {
    	$beneficiario = Beneficiario::find($id);
        $medicamentos = Medicamento::paginate(5);
    	return view('salidaMedicamento.panelSalidaMedicamento')
                            ->with('beneficiario', $beneficiario)
                            ->with('medicamentos', $medicamentos);
    }
    
}