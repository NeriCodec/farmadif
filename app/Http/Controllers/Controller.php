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
        foreach ($medicamentoRequerido as $mMedicamentoRequerido) 
        {
            if($diaActual == $mMedicamentoRequerido->dia_desbloqueo) 
            {
                $medicamento = Medicamento::find($mMedicamentoRequerido->id_medicamento);
                $medicamento->tipo_bloqueo = 'desbloqueado';
                $medicamento->save();

                $mMedicamentoRequerido = MedicamentoRequerido::find($mMedicamentoRequerido->id_medicamentos_requeridos);
                $mMedicamentoRequerido->estatus_solicitud = 'liberado';
                $mMedicamentoRequerido->save();
            }
        }
    }
}
