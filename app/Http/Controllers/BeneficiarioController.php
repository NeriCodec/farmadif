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
    * Muestra la tabla de los beneficiarios
    *
    * @return View
    */
    public function mostrarBeneficiarios(Request $request)
    {
        $beneficiarios = Beneficiario::buscarBeneficiario($request->get('beneficiario'))->paginate(10);
    	return view('beneficiario.beneficiarios')->with('beneficiarios', $beneficiarios);
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


    public function mostrarDetalleBeneficiario($idBeneficiario)
    {
        $beneficiario = Beneficiario::find($idBeneficiario);
        $detallesBeneficiario = Beneficiario::medicamentosDelBeneficiario($idBeneficiario);

        return view('beneficiario.detalles')->with('detalles', $detallesBeneficiario)
                                            ->with('beneficiario', $beneficiario);
    }
}
