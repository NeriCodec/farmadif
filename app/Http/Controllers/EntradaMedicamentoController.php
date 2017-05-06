<?php

namespace App\Http\Controllers;

use App\Donador;
use Illuminate\Http\Request;
use App\Http\Database\DonadorDatabase;
use App\Http\Database\MedicamentoDatabase;
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
    	
    	$donador = Donador::find($idDonador);
    	return view('entradaMedicamento.panelEntradaMedicamento')->with('donador', $donador);
    }

    public function GurdarNuevoMedicamento(RegistrarMedicamentoRequest $request){

        MedicamentoDatabase::guardarMedicamento($request);
        return redirect()->route('ruta_medicamentos');
    }


}