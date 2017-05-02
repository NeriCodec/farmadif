<?php

namespace App\Http\Controllers;

use App\Donador;
use Illuminate\Http\Request;
use App\Http\Database\DonadorDatabase;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Auth;

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


}