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
    }
    
    public function MostrarDonadores(Request $request)
    {

    	$donadores = Donador::buscarDonador($request->get('donador'))->paginate(1);
    	return view('entradaMedicamento.panel')->with('donadores', $donadores);
    }

    public function SelecionarDonador($idDonador,Request $request){
    	$medicamentos = Medicamento::paginate(5);
        $medicamentoDonado = Medicamento::medicamentosDelDonador($idDonador);
    	$donador = Donador::find($idDonador);
    	return view('entradaMedicamento.panelEntradaMedicamento')->with('donador', $donador)->with('medicamentos', $medicamentos)->with('medicamentosDonador', $medicamentoDonado);

    }

    public function GurdarNuevoMedicamento(RegistrarMedicamentoRequest $request){

        MedicamentoDatabase::guardarMedicamento($request);
        //gaurdar registro en la entrada de medicamento
        $obtieneUltimoMedicamento = Medicamento::all()->last();
        EntradaMedicamentoDatabase::guardarEntradaMedicamento($request,$obtieneUltimoMedicamento->id_medicamento);
        
        return redirect()->route('ruta_medicamentos');
    }

    public function BuscarMedicamentoSeleccionar($idDonador,Request $request){
        $medicamentos = Medicamento::BuscarMedicamento($request->get('medicamento'))->paginate(5);
        $medicamentoDonado = Medicamento::medicamentosDelDonador($idDonador);
        $donador = Donador::find($idDonador);
        return view('entradaMedicamento.panelEntradaMedicamento')->with('donador', $donador)->with('medicamentos', $medicamentos)->with('medicamentosDonador', $medicamentoDonado);
    }

    public function NuevoMedicamentoRegistrar($idDonador,Request $request)
    {
        $donador = Donador::find($idDonador);
        return view('entradaMedicamento.registrarMedicamentoEntrada')->with('donador', $donador)->with('medicamentos');
    }

    public function NuevoExistenteMedicamentoRegistrar($idDonador,$idMedicamento,Request $request){
        
        $medicamento = Medicamento::find($idMedicamento);;
        $donador = Donador::find($idDonador);
        return view('entradaMedicamento.registrarMedicamentoEntrada')->with('donador', $donador)->with('medicamentos', $medicamento);
    }
    

}