<?php

namespace App\Http\Controllers;

use App\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    public function index()
    {
    	$medicamentos = Medicamento::paginate(10);
    	return view('medicamento.medicamentos')->with('medicamentos', $medicamentos);
    }
}
