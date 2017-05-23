<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/home');
    }

    // public static function verificarSolicitudes()
    // {
    //     $medicamentoRequerido = SolicitudMedicamento::medicamentosRequeridos();

    //     $diaActual = strftime("%A");
    //     foreach ($medicamentoRequerido as $solicitud) 
    //     {
    //         if($diaActual == $solicitud->dia_desbloqueo) 
    //         {
    //             $medicamento = Medicamento::find($solicitud->id_medicamento);
    //             $medicamento->tipo_bloqueo = 'desbloqueado';
    //             $medicamento->save();

    //             $solicitud = MedicamentoRequerido::find($solicitud->id_medicamentos_requeridos);
    //             $solicitud->estatus_solicitud = 'liberado';
    //             $solicitud->save();
    //         }
    //     }
    // }
}
