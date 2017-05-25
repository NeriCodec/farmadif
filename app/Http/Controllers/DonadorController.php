<?php

namespace App\Http\Controllers;

use App\Donador;
use App\Medicamento;
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
        parent::__construct();
    }
    
    /**
    * Muestra una lista de todos lo donadores registrados.
    *
    * @return View
    */
    public function mostrarDonadores(Request $request)
    {
    	$donadores = Donador::buscarDonador($request->get('donador'))->paginate(10);
    	return view('donador.donadores')->with('donadores', $donadores);
    }

    /**
    * Muestra el formulario para el registro de un donador
    *
    * @return View
    */
    public function mostrarRegistro()
    {
    	return view('donador.registro')->with('actualizar',FALSE);
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
        session()->flash('mensaje', 'EL DONADOR FUE REGISTRADO CON EXITO');
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

    public function obtieneMedicamentosDonados($idDonador,Request $request){

        $medicamentoDonado = Medicamento::medicamentosDelDonador($idDonador);
        $donador = Donador::find($idDonador);
        return view('donador.medicamentosDelDonador')->with('donador', $donador)->with('medicamentos', $medicamentoDonado);
    }


    public function eliminarDonador($idDonador,Request $request){
        try
        {
            $donador = Donador::find($idDonador);
            $donador->delete();
            session()->flash('mensaje', 'EL DONADOR FUE ELIMINADO CON EXITO');
            return redirect()->route('ruta_donadores');
        }
        catch(\Exception $e)
        {
            session()->flash('mensaje', 'EL DONADOR NO SE PUEDE ELIMINAR, ESTA EN USO.');
            return redirect()->route('ruta_donadores');
        }
    }

    public function actualizarDonador($idDonador,Request $request){
        $donador = Donador::find($idDonador);
        return view('donador.registro')->with('donador',$donador)->with('actualizar',TRUE);
    }

    public function guardaActualizarDonador(RegistrarDonadorRequest $request){
              //DonadorDatabase::guardarActualizarDonador($request);
        $donador = Donador::where('id_donador', '=', $request->get('idDonador'))->first();
        if (count($donador)>0) {
            $donador->nombre =$request->get('nombre');
            $donador->domicilio =$request->get('domicilio');
            $donador->num_telefonico =$request->get('telefono');
            $donador->codigo_postal =$request->get('codigo');
            $donador->observaciones =$request->get('observaciones');
            $donador->usuario = $request->get('usuario');
            $donador->contrasenia = $request->get('contrasenia');
            $donador->fecha_registro =date("Y-m-d h:m:s");
            if ($donador->save()) {
                    session()->flash('mensaje', 'EL DONADOR FUE ACTUALIZADO CON EXITO');
                    return redirect()->route('ruta_donadores');
                }else{
                    echo "Error al actualizar";
                }    
            
        }
    
    }

}
