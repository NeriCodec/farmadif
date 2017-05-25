<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        Carbon::setLocale('es');
        $medicamentoRequerido = SolicitudMedicamento::medicamentosRequeridos();
        $diaActual = Carbon::now();

        foreach ($medicamentoRequerido as $mMedicamentoRequerido) 
        {
        	$fechaInicial = new Carbon($mMedicamentoRequerido->fecha_inicio_bloqueo);
        	$fechaFinal = new Carbon($mMedicamentoRequerido->fecha_fin_bloqueo);
        	$medicamento = Medicamento::find($mMedicamentoRequerido->id_medicamento);

        	if($fechaFinal < $diaActual) {
        		$medicamento->dias_restantes = -1;	
        		$medicamento->tipo_bloqueo = 'desbloqueado';
                $mMedicamentoRequerido = MedicamentoRequerido::find($mMedicamentoRequerido->id_medicamentos_requeridos);
                $mMedicamentoRequerido->estatus_solicitud = 'liberado';
                
                $medicamento->save();
                $mMedicamentoRequerido->save();
        	}
        	else 
        	{
        		$diferencia = $diaActual->diff($fechaFinal)->days;
                $medicamento->dias_restantes = $diferencia;
            	$medicamento->save();
        	}
        }

    }
}
