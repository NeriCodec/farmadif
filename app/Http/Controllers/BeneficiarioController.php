<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeneficiarioController extends Controller
{
    public function index()
    {
    	//return view('beneficiario.registro');
    }

    public function registrar()
    {
    	return view('beneficiario.registro');
    }
}
