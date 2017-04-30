<?php

namespace App\Http\Controllers;


use App\Medicamento;
use App\Beneficiario;
use App\SalidaMedicamento;
use Illuminate\Http\Request;
use App\VerificacionMedicamento;
use App\Http\Requests\VerificarRequest;
use App\Http\Database\SalidaMedicamentoDatabase;
use App\Http\Database\VerificacionSalidaDatabase;

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
    public function mostrarVerificarSalidaDeMedicamento($idbeneficiario, Request $request)
    {
        $beneficiario = Beneficiario::find($idbeneficiario);
        return view('salidaMedicamento.panelVerificacionMedicamento')->with('beneficiario', $beneficiario);
    }

    /**
    * Permite agregar la verificacion.
    * @param Int $id 
    * @param Request $request
    * @return View
    */
    public function verificarSalidaDeMedicamento($id, VerificarRequest $request)
    {
        $beneficiario = Beneficiario::find($id);
        $medicamentos = Medicamento::buscarMedicamento($request->get('medicamento'))->paginate(5);
        VerificacionSalidaDatabase::guardarVerificacionMedicamento($request);
        $verificacionMedicamento = VerificacionMedicamento::all()->last();
        $medicamentosAgregados = SalidaMedicamento::medicamentosAgregados($verificacionMedicamento->id_salida_verificacion);

        return view('salidaMedicamento.panelSalidaMedicamento')->with('beneficiario', $beneficiario)
        ->with('medicamentos', $medicamentos)
        ->with('verificado', 'si')
        ->with('medicamentosAgregados', $medicamentosAgregados);
    }

    /**
    * Permite agregar un medicamento a un beneficiario
    * @param Int $id  Id del medicamento
    * @param Int $idb Id del beneficiario
    * @param Request $request
    * @return View
    */
    public function agregarMedicamento($idMedicamento, $idBeneficiario, Request $request)
    {
        $medicamento = Medicamento::find($idMedicamento);
        
        // if($medicamento->cantidad == 0) {
        //     return 'agotado';
        // }

        $verificacionMedicamento = VerificacionMedicamento::all()->last();

        SalidaMedicamentoDatabase::guardarSalidaMedicamento($idMedicamento, $idBeneficiario, $verificacionMedicamento->id_salida_verificacion);
        // Se descuenta el medicamento agregado
        $medicamento->cantidad = $medicamento->cantidad - 1;
        $medicamento->save(); 

        
        $medicamentosAgregados = SalidaMedicamento::medicamentosAgregados($verificacionMedicamento->id_salida_verificacion);

        $beneficiario = Beneficiario::find($idBeneficiario);
        $medicamentos = Medicamento::buscarMedicamento($request->get('medicamento'))->paginate(5);

        return view('salidaMedicamento.panelSalidaMedicamento')->with('beneficiario', $beneficiario)
        ->with('medicamentos', $medicamentos)
        ->with('verificado', 'si')
        ->with('medicamentosAgregados', $medicamentosAgregados);
    }

    /**
    * Elimina un medicamento de un beneficiario, por si existe algun error,
    * al tratar de asignar el medicamento.
    * @param Int $id  Id del medicamento
    * @param Int $idb Id del beneficiario
    * @param Request $request
    * @return String
    */
    public function eliminarMedicamento($idmedicamento, $idbeneficiario, $idSalidaMedicamento, Request $request)
    {

        $medicamento = Medicamento::find($idmedicamento);
        $medicamento->cantidad = $medicamento->cantidad + 1;
        $medicamento->save(); 
        
        $medicamentosAgregados = SalidaMedicamento::find($idSalidaMedicamento);
        $medicamentosAgregados->delete();

        $verificacionMedicamento = VerificacionMedicamento::all()->last();
        $medicamentosAgregados = SalidaMedicamento::medicamentosAgregados($verificacionMedicamento->id_salida_verificacion);

        $beneficiario = Beneficiario::find($idbeneficiario);
        $medicamentos = Medicamento::buscarMedicamento($request->get('medicamento'))->paginate(5);

 

        return view('salidaMedicamento.panelSalidaMedicamento')->with('beneficiario', $beneficiario)
        ->with('medicamentos', $medicamentos)
        ->with('verificado', 'si')
        ->with('medicamentosAgregados', $medicamentosAgregados);

    }
    
}