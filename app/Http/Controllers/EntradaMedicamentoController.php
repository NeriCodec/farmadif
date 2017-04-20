<?php

namespace App\Http\Controllers;


use App\Beneficiario;
use App\Medicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntradaMedicamentoController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	return view('entradaMedicamento.panelEntradaMedicamento');
    }


}