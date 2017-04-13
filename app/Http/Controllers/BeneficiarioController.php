<?php

namespace App\Http\Controllers;

use App\Beneficiario;
use Illuminate\Http\Request;
use App\Http\Data\BeneficiarioData;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegistrarBeneficiarioRequest;

class BeneficiarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$beneficiarios = Beneficiario::paginate(10);
    	return view('beneficiario.beneficiarios')->with('beneficiarios', $beneficiarios);
    }

    public function registro()
    {
    	return view('beneficiario.registro');
    }

    public function registrar(RegistrarBeneficiarioRequest $request)
    {
        BeneficiarioData::guardarBeneficiario($request);
    	return redirect()->route('ruta_beneficiarios');
    }
}
