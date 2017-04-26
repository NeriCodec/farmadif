<?php

namespace App\Http\Controllers;

use App\Donador;
use Illuminate\Http\Request;
use App\Http\Database\DonadorDatabase;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegistrarDonadorRequest;

class DonadorController extends Controller
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
    * Muestra una lista de todos lo donadores registrados.
    *
    * @return View
    */
    public function index()
    {
    	$donadores = Donador::paginate(10);
    	return view('donador.donadores')->with('donadores', $donadores);
    }

    /**
    * Muestra el formulario para el registro de un donador
    *
    * @return View
    */
    public function mostrarRegistro()
    {
    	return view('donador.registro');
    }

    /**
    * Permite obtener los datos del donador para despues pasarlos a
    * DonadorDatabase para poder almacenar el donador.
    * @param RegistrarDonadorRequest $request
    * @return View
    */
    public function registrar(RegistrarDonadorRequest $request)
    {
        DonadorDatabase::guardarDonador($request);
    	return redirect()->route('ruta_donadores');
    }

    /**
    * Permite obtner todos los donadores registrados dentro de la aplicacion
    *
    * @return Array (JSON)
    */
    public function obtenerTodosLosDonadores()
    {
        return Datatables::eloquent(Donador::query())->make(true);
    }
}
