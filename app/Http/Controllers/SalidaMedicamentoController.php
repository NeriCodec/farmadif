<?php

namespace App\Http\Controllers;


use App\Medicamento;
use App\Beneficiario;
use App\SalidaMedicamento;
use Illuminate\Http\Request;
use App\SolicitudMedicamento;
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
        parent::__construct();
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
        session()->flash('mensaje', 'SOLICITUD CREADA CON EXITO');
        // Se genera el registro en el LOG
        LogSalidaMedicamento::guardarLogVerificarSalida($idBeneficiario);

        return redirect()->route('ruta_salida_verificada_medicamentos', ['idBeneficiario' => $idBeneficiario]);
    }

    public function mostrarSalidaDeMedicamento($idBeneficiario, Request $request)
    {
        // Se busca el beneficiario actual, y/o todos los medicamentos para poder donar
        $beneficiario = Beneficiario::find($idBeneficiario);

        if ($request->get('medicamento') == "") {
           $medicamentos = Medicamento::BuscarMedicamentoSalida("sin_medicamento")->paginate(1);
        } else {
            $medicamentos = Medicamento::BuscarMedicamentoSalida($request->get('medicamento'))->paginate(100);
        }

        // Se obtiene la verificacion y los todos los medicamentos agregados
        $solicitudMedicamento = SolicitudMedicamento::all()->last();
        $medicamentosAgregados = SalidaMedicamento::medicamentosAgregados($solicitudMedicamento->id_solicitud);

       $medicamentosRequeridos = Beneficiario::medicamentosRequeridosPorUnBeneficiario($idBeneficiario, $solicitudMedicamento->id_solicitud);

       // dd(count($medicamentosRequeridos));

        return view('salidaMedicamento.panelSalidaMedicamento')->with('beneficiario', $beneficiario)
        ->with('medicamentos', $medicamentos)
        ->with('medicamentosRequeridos', $medicamentosRequeridos)
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
        $cantidadADonar = 1;
        $solicitudMedicamento = SolicitudMedicamento::all()->last();
        $medicamento = Medicamento::find($idMedicamento);

        if($medicamento->estatus == 'existencia') 
        {
            // Se alamacena la salida del medicamento
            SalidaMedicamentoDatabase::guardarSalidaMedicamento (
            $idMedicamento,
            $idBeneficiario,
            $solicitudMedicamento->id_solicitud,
            $cantidadADonar
            );

            $medicamento->estatus = 'donado';
            $medicamento->save();

            // Se genera el registro en el LOG
            VerificacionSalidaDatabase::actualizarTipoSolicitud($solicitudMedicamento->id_solicitud);
            LogSalidaMedicamento::guardarLogSalidaMedicamento($idBeneficiario,'Exitosa', $cantidadADonar);

            // session()->flash('mensaje', 'MEDICAMENTO AGREGADO CON EXITO');
        }
        else
        {
           // Se genera el registro en el LOG
           LogSalidaMedicamento::guardarLogSalidaMedicamento($idBeneficiario, 'Sin medicamentos', 0);
        }

        // Se obtienen todos los medicamentos agregados
        $medicamentosAgregados = SalidaMedicamento::medicamentosAgregados($solicitudMedicamento->id_solicitud); 
        // Se busca el beneficiario actual, y/o todos los medicamentos para poder donar
        if ($request->get('medicamento') == "") {
           $medicamentos = Medicamento::buscarMedicamento("sin_medicamento")->paginate(1);
        } else {
            $medicamentos = Medicamento::buscarMedicamento($request->get('medicamento'))->paginate(100);
        }

        $beneficiario = Beneficiario::find($idBeneficiario);

        $medicamentosRequeridos = Beneficiario::medicamentosRequeridosPorUnBeneficiario($idBeneficiario, $solicitudMedicamento->id_solicitud);


        return view('salidaMedicamento.panelSalidaMedicamento')->with('beneficiario', $beneficiario)
        ->with('medicamentos', $medicamentos)
        ->with('medicamentosRequeridos', $medicamentosRequeridos)
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

        $medicamentosAgregados = SalidaMedicamento::find($idSalidaMedicamento);
        
        if($medicamentosAgregados != null )
        {
            $medicamento = Medicamento::find($idmedicamento);
            $medicamento->estatus = 'existencia';
            $medicamento->save(); 
            //$medicamentosAgregados = SalidaMedicamento::find($idSalidaMedicamento);
            $medicamentosAgregados->delete();

            // session()->flash('mensaje', 'MEDICAMENTO QUITADO CON EXITO');
        }

        $solicitudMedicamento = SolicitudMedicamento::all()->last();
        $medicamentosAgregados = SalidaMedicamento::medicamentosAgregados($solicitudMedicamento->id_solicitud);
        $beneficiario = Beneficiario::find($idbeneficiario);
        
        if ($request->get('medicamento') == "") 
        {
           $medicamentos = Medicamento::buscarMedicamento("sin_medicamento")->paginate(1);
        } 
        else
        {
            $medicamentos = Medicamento::buscarMedicamento($request->get('medicamento'))->paginate(100);
        }

 
        $medicamentosRequeridos = Beneficiario::medicamentosRequeridosPorUnBeneficiario($idbeneficiario, $solicitudMedicamento->id_solicitud);

        return view('salidaMedicamento.panelSalidaMedicamento')->with('beneficiario', $beneficiario)
        ->with('medicamentos', $medicamentos)
        ->with('medicamentosRequeridos', $medicamentosRequeridos)
        ->with('medicamentosAgregados', $medicamentosAgregados);

    }

    public function eliminarVerificacion()
    {
        try 
        {
            $solicitudMedicamento = SolicitudMedicamento::all()->last();
            $solicitudMedicamento->delete();
            session()->flash('mensaje', 'SOLICITUD CANCELADA CON EXITO');
        }
        catch(\Exception $e)
        {
            session()->flash('mensaje', 'HUBO UN ERROR AL CANCELAR LA SOLICITUD');
            return redirect()->route('ruta_salida_medicamentos');
        }
        return redirect()->route('ruta_salida_medicamentos');
    }
}