<?php

namespace App\Http\Controllers;


use App\Medicamento;
use App\Beneficiario;
use App\SalidaMedicamento;
use Illuminate\Http\Request;
use App\Http\Database\SalidaMedicamentoDatabase;

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
    	$beneficiario = Beneficiario::find($id);
    	return view('salidaMedicamento.panelSalidaMedicamento')->with('beneficiario', $beneficiario);
    }

    public function agregar($id, $idb, Request $request)
    {
        $medicamento = Medicamento::find($id);
        if($medicamento->cantidad == 0) {
            return 'agotado';
        } else {
            SalidaMedicamentoDatabase::guardarSalidaMedicamento($id, $idb);
            $medicamento->cantidad = $medicamento->cantidad - 1;
            $medicamento->save(); 
        }
        
        if($request->ajax()) {
            return 'exito';
        }
    }

    public function eliminar($id, $idb, Request $request)
    {
        $medicamento = Medicamento::find($id);
        SalidaMedicamentoDatabase::guardarSalidaMedicamento($id, $idb);
        $medicamento->cantidad = $medicamento->cantidad + 1;
        $medicamento->save(); 
        
        if($request->ajax()) {
            return 'exito';
        }
    }
    
}