<?php

namespace App\Http\Controllers;


use App\Beneficiario;
use App\Medicamento;
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

    public function salida($id, Request $request)
    {
        //dd($request->get('busqueda'));
        $medicamentos = Medicamento::medicamento($request->get('medicamento'))->paginate(5);
    	$beneficiario = Beneficiario::find($id);
    	return view('salidaMedicamento.panelSalidaMedicamento')
                    ->with('beneficiario', $beneficiario)
                    ->with('medicamentos', $medicamentos);
    }
    
}