<?php

namespace App\Http\Controllers;

use App\Donador;
use Illuminate\Http\Request;
use App\Http\Database\DonadorDatabase;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegistrarDonadorRequest;

class DonadorController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$donadores = Donador::paginate(10);
    	return view('donador.donadores')->with('donadores', $donadores);
    }

    public function mostrarRegistro()
    {
    	return view('donador.registro');
    }

    public function registrar(RegistrarDonadorRequest $request)
    {
        DonadorDatabase::guardarDonador($request);
    	return redirect()->route('ruta_donadores');
    }
}
