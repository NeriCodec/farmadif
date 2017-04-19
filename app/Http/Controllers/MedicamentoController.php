<?php

namespace App\Http\Controllers;

use App\Medicamento;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class MedicamentoController extends Controller
{
    public function mostrarMedicamento()
    {
    	return view('medicamento.medicamentos');
    }

    public function obtenerTodosLosMedicamentos()
    {
    	return Datatables::eloquent(Medicamento::query())->make(true);
    }

    
}
