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
        parent::__construct();
    }
    
    /**
    * Muestra el panel de medicamentos
    *
    * @return View
    */
    public function mostrarMedicamentos()
    {
        $medicamentos = Medicamento::paginate(20);
    	return view('medicamento.medicamentos')->with('medicamentos', $medicamentos);
    }
    

    /**
    * Permite obtener todos los medicamentos registrados dentro de la aplicacion
    *
    * @return Array (JSON)
    */
    // public function obtenerTodosLosMedicamentos()
    // {
    //     $medicamentos = Medicamento::all();
    //     return $medicamentos;
    // }

    
}
