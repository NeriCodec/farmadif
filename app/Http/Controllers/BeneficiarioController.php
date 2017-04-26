<?php

namespace App\Http\Controllers;

use App\Beneficiario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Database\BeneficiarioDatabase;
use App\Http\Requests\RegistrarBeneficiarioRequest;

class BeneficiarioController extends Controller
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
    * Muestra la tabla de beneficiarios
    *
    * @return View
    */
    public function index()
    {
    	return view('beneficiario.beneficiarios');
    }

    /**
    * Muestra el formulario de registro
    *
    * @return View
    */
    public function mostrarRegistro()
    {
    	return view('beneficiario.registro');
    }

    /**
    * Permite obtener los datos del beneficiario para despues pasarlos al
    * BeneficiarioDatabase y almacenarlos en la base de datos.
    * @param RegistrarDonadorRequest $request
    * @return View
    */
    public function registrar(RegistrarBeneficiarioRequest $request)
    {
        BeneficiarioDatabase::guardarBeneficiario($request);
    	return redirect()->route('ruta_beneficiarios');
    }

    /**
    * Permite obtner todos los beneficiarios registrados dentro de la aplicacion
    *
    * @return Array (JSON)
    */
    public function obtenerTodosLosBeneficiarios()
    {
        return Datatables::eloquent(Beneficiario::query())->make(true);
    }
}
