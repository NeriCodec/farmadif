<?php

namespace App\Http\Controllers;

use App\Usuarios;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    public function autenticacion()
    {
    	if(Auth::attempt(['usuario' => $usuario, 'password' => $password])){
    		return route()->intended('dashboard');
    	}
    }
}
