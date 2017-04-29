<?php

namespace App\Http\Controllers;


use App\Medicamento;
use App\Beneficiario;
use App\SalidaMedicamento;
use Illuminate\Http\Request;
use App\Http\Database\SalidaMedicamentoDatabase;

class SalidaMedicamentoController extends Controller
{
     /**
    * Determina si el usuario esta autenticado en la aplicacion.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
     /**
    * Muestra una lista de beneficiarios en forma paginada, a menos que se este
    * buscando un beneficiario entonces, solamente se mostrara ese o esos beneficiarios.
    *
    * @return View
    */
    public function mostrarBeneficiarios(Request $request)
    {
    	$beneficiarios = Beneficiario::buscarBeneficiario($request->get('beneficiario'))->paginate(10);
    	return view('salidaMedicamento.panel')->with('beneficiarios', $beneficiarios);
    }

     /**
    * Muestra el panel de salida de medicamento, unicamente para un beneficiario.
    * @param Int $id 
    * @param Request $request
    * @return View
    */
    public function salida($id, Request $request)
    {
    	$beneficiario = Beneficiario::find($id);
        $medicamentos = Medicamento::all();
    	return view('salidaMedicamento.panelSalidaMedicamento')->with('beneficiario', $beneficiario)->with('medicamentos', $medicamentos);
    }

    /**
    * Permite agregar un medicamento a un beneficiario
    * @param Int $id  Id del medicamento
    * @param Int $idb Id del beneficiario
    * @param Request $request
    * @return String
    */
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

    /**
    * Elimina un medicamento de un beneficiario, por si existe algun error,
    * al tratar de asignar el medicamento.
    * @param Int $id  Id del medicamento
    * @param Int $idb Id del beneficiario
    * @param Request $request
    * @return String
    */
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