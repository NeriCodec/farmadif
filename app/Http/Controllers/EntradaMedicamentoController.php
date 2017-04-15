<?php

namespace App\Http\Controllers;


use App\Beneficiario;
use App\Medicamento;
use Illuminate\Http\Request;

class EntradaMedicamentoController extends Controller
{
    public function index()
    {
    	return view('entradaMedicamento.panelEntradaMedicamento');
    }


}