<?php

namespace App\Http\Controllers;

use App\Donador;
use App\Medicamento;
use Illuminate\Http\Request;
use App\Http\Database\DonadorDatabase;
use App\Http\Database\MedicamentoDatabase;
use App\Http\Database\EntradaMedicamentoDatabase;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegistrarMedicamentoRequest;

class EntradaMedicamentoController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }
    
    public function mostrarDonadores(Request $request)
    {

    	$donadores = Donador::buscarDonador($request->get('donador'))->paginate(10);
    	return view('entradaMedicamento.panel')->with('donadores', $donadores);
    }

    public function selecionarDonador($idDonador,Request $request)
    {
    	$medicamentos = Medicamento::paginate(10);
        $medicamentoDonado = Medicamento::medicamentosDelDonador($idDonador);
        $medicamentoNecesario = Medicamento::obtineMedicamentoRequeridos();
    	$donador = Donador::find($idDonador);
    	return view('entradaMedicamento.panelEntradaMedicamento')->with('donador', $donador)->with('medicamentos', $medicamentos)->with('medicamentosDonador', $medicamentoDonado)->with('medicamentoRequerido', $medicamentoNecesario);

    }

    public function gurdarNuevoMedicamento(RegistrarMedicamentoRequest $request, $idMedicamento)
    {
        
        $medicamento = Medicamento::find($idMedicamento);

        // dd($medicamento);
        
        if($medicamento == null) 
        {
            MedicamentoDatabase::guardarMedicamento($request); 
           //gaurdar registro en la entrada de medicamento
            $obtieneUltimoMedicamento = Medicamento::all()->last();
            EntradaMedicamentoDatabase::guardarEntradaMedicamento($request, $obtieneUltimoMedicamento->id_medicamento);
            
        }
        else 
        {
           if($medicamento->estatus == 'requerido') 
           {
                MedicamentoDatabase::actualizarMedicamento($request, $idMedicamento); 
                $obtieneUltimoMedicamento = Medicamento::all()->last();
                EntradaMedicamentoDatabase::guardarEntradaMedicamento($request, $medicamento->id_medicamento);
           }
           else 
           {
                MedicamentoDatabase::guardarMedicamento($request); 
                //gaurdar registro en la entrada de medicamento
                $obtieneUltimoMedicamento = Medicamento::all()->last();
                EntradaMedicamentoDatabase::guardarEntradaMedicamento($request, $obtieneUltimoMedicamento->id_medicamento);
           }
          
        }
        
        
        session()->flash('mensaje', 'EL MEDICAMENTO SE GUARDO CON EXITO');
        return redirect()->route('ruta_entrada_medicamentos');
    }

    public function buscarMedicamentoSeleccionar($idDonador,Request $request)
    {
        $medicamentos = Medicamento::BuscarMedicamento($request->get('medicamento'))->paginate(10);
        $medicamentoDonado = Medicamento::medicamentosDelDonador($idDonador);
        $medicamentoNecesario = Medicamento::obtineMedicamentoRequeridos();
        $donador = Donador::find($idDonador);
        return view('entradaMedicamento.panelEntradaMedicamento')->with('donador', $donador)->with('medicamentos', $medicamentos)->with('medicamentosDonador', $medicamentoDonado)->with('medicamentoRequerido', $medicamentoNecesario);
    }

    public function nuevoMedicamentoRegistrar($idDonador, Request $request)
    {
        $donador = Donador::find($idDonador);
        return view('entradaMedicamento.registrarMedicamentoEntrada')->with('donador', $donador)->with('medicamentos');
    }

    public function nuevoExistenteMedicamentoRegistrar($idDonador,$idMedicamento,Request $request){
        
        $medicamento = Medicamento::find($idMedicamento);
        $donador = Donador::find($idDonador);
        return view('entradaMedicamento.registrarMedicamentoEntrada')->with('donador', $donador)->with('medicamentos', $medicamento);
    }

    public function mostrarMedicamentosDonados($value='')
    {
        
    }
    

}