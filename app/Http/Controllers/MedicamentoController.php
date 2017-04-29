<?php

namespace App\Http\Controllers;

use App\Medicamento;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class MedicamentoController extends Controller
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
    * Muestra el panel de medicamentos
    *
    * @return View
    */
    public function mostrarMedicamentos()
    {
        $medicamentos = Medicamento::paginate(10);
    	return view('medicamento.medicamentos')->with('medicamentos', $medicamentos);
    }

    /**
    * Permite obtner todos los medicamentos registrados dentro de la aplicacion
    *
    * @return Array (JSON)
    */
    public function obtenerTodosLosMedicamentos()
    {
    	return Datatables::eloquent(Medicamento::query())->make(true);
    }

    
}
