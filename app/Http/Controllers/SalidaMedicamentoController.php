<?php

namespace App\Http\Controllers;


use App\Medicamento;
use App\Beneficiario;
use App\SalidaMedicamento;
use Illuminate\Http\Request;
use App\VerificacionMedicamento;
use App\Http\Log\LogSalidaMedicamento;
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
    * Permite realizar la verificacion de salida de medicamentos.
    * @param Int $id 
    * @param Request $request
    * @return View
    */
    public function verificarSalidaDeMedicamento($idBeneficiario, VerificarRequest $request)
    {
        // Se obtiene el beneficiario y se guarda la verificacion del medicamento
        $beneficiario = Beneficiario::find($idBeneficiario);
        VerificacionSalidaDatabase::guardarVerificacionMedicamento($request);

        // Se genera el registro en el LOG
        LogSalidaMedicamento::guardarLog('Se realizo la verificacion con Id beneficiario ' . $idBeneficiario);

        return redirect()->route('ruta_salida_verificada_medicamentos', ['idBeneficiario' => $idBeneficiario]);
    }

    public function mostrarSalidaDeMedicamento($idBeneficiario, Request $request)
    {
        // Se busca el beneficiario actual, y/o todos los medicamentos para poder donar
        $beneficiario = Beneficiario::find($idBeneficiario);
        $medicamentos = Medicamento::buscarMedicamento($request->get('medicamento'))->paginate(5);

        // Se obtiene la verificacion y los todos los medicamentos agregados
        $verificacionMedicamento = VerificacionMedicamento::all()->last();
        $medicamentosAgregados = SalidaMedicamento::medicamentosAgregados($verificacionMedicamento->id_salida_verificacion);

        return view('salidaMedicamento.panelSalidaMedicamento')->with('beneficiario', $beneficiario)
        ->with('medicamentos', $medicamentos)
        ->with('medicamentosAgregados', $medicamentosAgregados);
    }

    /**
    * Permite agregar un medicamento a la salida de medicamento
    * @param Int $id  Id del medicamento
    * @param Int $idb Id del beneficiario
    * @param Request $request
    * @return View
    */
    public function agregarMedicamento($idMedicamento, $idBeneficiario, Request $request)
    {
        // Se obtiene la verificacion y el medicamento para agregar
        $cantidadADonar = $request->get('cantidad');        
        $verificacionMedicamento = VerificacionMedicamento::all()->last();
        $medicamento = Medicamento::find($idMedicamento);

        if($medicamento->cantidad > 0) 
        {
            // Se alamacena la salida del medicamento
            SalidaMedicamentoDatabase::guardarSalidaMedicamento (
            $idMedicamento,
            $idBeneficiario,
            $verificacionMedicamento->id_salida_verificacion,
            $cantidadADonar
            );

            // Del medicuamento actual se desminuye la cantidad a donar y se actualiza el medicamento
            $medicamento->cantidad = $medicamento->cantidad - $cantidadADonar;
            $medicamento->save();

        } 

        // Se obtienen todos los medicamentos agregados
        $medicamentosAgregados = SalidaMedicamento::medicamentosAgregados($verificacionMedicamento->id_salida_verificacion); 
        // Se busca el beneficiario actual, y/o todos los medicamentos para poder donar
        $medicamentos = Medicamento::buscarMedicamento($request->get('medicamento'))->paginate(5);
        $beneficiario = Beneficiario::find($idBeneficiario);

        return view('salidaMedicamento.panelSalidaMedicamento')->with('beneficiario', $beneficiario)
        ->with('medicamentos', $medicamentos)
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
    public function eliminarMedicamento($idmedicamento, $idbeneficiario, $idSalidaMedicamento, $cantidad, Request $request)
    {
        // Se obtiene el medicamento agregado y se le suma la cantidad que se le disminuyo para restablecer
        // la cantidad quitada al momento de agregarlo a la tabla (medicamentos agregados)
        $medicamento = Medicamento::find($idmedicamento);
        $medicamento->cantidad = $medicamento->cantidad + $cantidad;
        $medicamento->save(); 
        
        // Se elimina la salida de medicamento anteriormente registrada, para no tener salidas de medicamentos confusasa
        // en la base de datos.
        $medicamentosAgregados = SalidaMedicamento::find($idSalidaMedicamento);
        $medicamentosAgregados->delete();

        // Se obtiene la verificacion y se obtiene todos los medicamentos agregados
        $verificacionMedicamento = VerificacionMedicamento::all()->last();
        $medicamentosAgregados = SalidaMedicamento::medicamentosAgregados($verificacionMedicamento->id_salida_verificacion);

        // Se busca el beneficiario actual, y/o todos los medicamentos para poder donar
        $beneficiario = Beneficiario::find($idbeneficiario);
        $medicamentos = Medicamento::buscarMedicamento($request->get('medicamento'))->paginate(5);

 

        return view('salidaMedicamento.panelSalidaMedicamento')->with('beneficiario', $beneficiario)
        ->with('medicamentos', $medicamentos)
        ->with('medicamentosAgregados', $medicamentosAgregados);

    }
    
}