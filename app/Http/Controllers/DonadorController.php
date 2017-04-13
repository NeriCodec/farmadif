<?php

namespace App\Http\Controllers;

use App\Donador;
use Illuminate\Http\Request;
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
    	$donadores = Donador::paginate(5);
    	return view('donador.donadores')->with('donadores', $donadores);
    }

    public function mostrarRegistro()
    {
    	return view('donador.registro');
    }

    public function registrar(RegistrarDonadorRequest $request)
    {
    	$donador = new Donador();

    	$donador->nombre = $request->get('nombre');
    	$donador->domicilio = $request->get('domicilio');
    	$donador->num_telefonico = $request->get('telefono');
    	$donador->codigo_postal = $request->get('codigo');
    	$donador->observaciones = $request->get('observaciones');
    	$donador->fecha_registro = date("Y-m-d h:m:s");
    	$donador->tb_usuarios_id_usuario = Auth::id();

    	$donador->save();

    	return redirect()->route('ruta_donadores');
    }
}
