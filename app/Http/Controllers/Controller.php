<?php

namespace App\Http\Controllers;

use App\Medicamento;
use App\SolicitudMedicamento;
use App\MedicamentoRequerido;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        date_default_timezone_set("America/Mexico_City");
        $medicamentoRequerido = SolicitudMedicamento::medicamentosRequeridos();
        $diaActual = strftime("%A");
        foreach ($medicamentoRequerido as $solicitud) 
        {
            if($diaActual == $solicitud->dia_desbloqueo) 
            {
                $medicamento = Medicamento::find($solicitud->id_medicamento);
                $medicamento->tipo_bloqueo = 'desbloqueado';
                $medicamento->save();

                $solicitud = MedicamentoRequerido::find($solicitud->id_medicamentos_requeridos);
                $solicitud->estatus_solicitud = 'liberado';
                $solicitud->save();
            }
        }
    }
}
