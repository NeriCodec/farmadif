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
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	return view('beneficiario.beneficiarios');
    }

    public function mostrarRegistro()
    {
    	return view('beneficiario.registro');
    }

    public function registrar(RegistrarBeneficiarioRequest $request)
    {
        BeneficiarioDatabase::guardarBeneficiario($request);
    	return redirect()->route('ruta_beneficiarios');
    }

    public function obtenerTodosLosBeneficiarios()
    {
        return Datatables::eloquent(Beneficiario::query())->make(true);
    }
}
