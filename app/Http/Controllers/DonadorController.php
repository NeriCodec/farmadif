<?php

namespace App\Http\Controllers;

use App\Donador;
use Illuminate\Http\Request;

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
}
