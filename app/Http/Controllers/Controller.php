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

        //$created = new Carbon($price->created_at);
		

		

        foreach ($medicamentoRequerido as $mMedicamentoRequerido) 
        {
        	// 24 mayo
        	// 30 mayo
        	// 30 - 24 = 6
        	$fechaInicial = new Carbon($mMedicamentoRequerido->fecha_inicio_bloqueo);
        	$fechaFinal = new Carbon($mMedicamentoRequerido->fecha_fin_bloqueo);
        	$medicamento = Medicamento::find($mMedicamentoRequerido->id_medicamento);

        	if($fechaFinal < $diaActual) {
        		$medicamento->dias_restantes = 0;	
        		$medicamento->tipo_bloqueo = 'desbloqueado';
        		$medicamento->save();

        		$mMedicamentoRequerido = MedicamentoRequerido::find($mMedicamentoRequerido->id_medicamentos_requeridos);
                $mMedicamentoRequerido->estatus_solicitud = 'liberado';
                $mMedicamentoRequerido->save();
        	}
        	else 
        	{
        		$diferencia = $diaActual->diff($fechaFinal)->days;
        		$medicamento->dias_restantes = $diferencia;
            // $medicamento->tipo_bloqueo = 'desbloqueado';
            	$medicamento->save();
        	//echo $diferencia;
        	}
        	//$diferencia = $diaActual->diff($fechaFinal)->days;
        	//echo $diferencia;
        	//$diasRestantes = $diaActual->subDay($fechaFinal)->days;
        	// $diferencia = ($fechaFinal->diff($fechaInicial)->days < 1) ? 'Hoy' : $fechaFinal->diffForHumans($fechaInicial);
        	//$medicamento = Medicamento::find($mMedicamentoRequerido->id_medicamento);
        	//$medicamento->dias_restantes = diferencia;
            // $medicamento->tipo_bloqueo = 'desbloqueado';
            //$medicamento->save();
        	//echo $diasRestantes;
        	// $diaInicialBloqueo = Carbon::createFromFormat('Y-m-d H:m:s', $mMedicamentoRequerido->fecha_inicio_bloqueo)->toDateTimeString(); 
        	// $diaFinBloqueo = Carbon::createFromFormat('Y-m-d H:m:s', $mMedicamentoRequerido->fecha_fin_bloqueo)->toDateTimeString(); 
        	// echo $diaInicialBloqueo . ' y ' . $diaFinBloqueo; 
        	// echo $diasRestantes;
            //if($diaActual == $mMedicamentoRequerido->dia_desbloqueo) 
            //{
                //$medicamento = Medicamento::find($mMedicamentoRequerido->id_medicamento);
                //$medicamento->tipo_bloqueo = 'desbloqueado';
                
                //$medicamento->save();
                //$mMedicamentoRequerido = MedicamentoRequerido::find($mMedicamentoRequerido->id_medicamentos_requeridos);
                //$mMedicamentoRequerido->estatus_solicitud = 'liberado';
                //$mMedicamentoRequerido->save();
            //}
        }

    }
}
