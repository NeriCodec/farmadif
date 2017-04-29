<?php

namespace App\Http\Database;

use App\SalidaMedicamento;
use Illuminate\Support\Facades\Auth;

class SalidaMedicamentoDatabase
{
	/**
    * Permite guardar en la base de datos la salida de medicamento
    * @param Int  $idMedicamento
    * @param Int  $idBeneficiario
    * @return void
    */
	public static function guardarSalidaMedicamento($idMedicamento, $idBeneficiario, $idVerificacion)
	{
        $salidaMedicamento = new SalidaMedicamento();
        $salidaMedicamento->tb_medicamentos_id_medicamento = $idMedicamento;
        $salidaMedicamento->fecha_salida_medicamento = date("Y-m-d");
    	$salidaMedicamento->tb_beneficiarios_id_beneficiario= $idBeneficiario;
        $salidaMedicamento->tb_salida_verificacion_id_salida_verificacion = $idVerificacion;
    	$salidaMedicamento->save();
	}
}