<?php

namespace App\Http\Database;

use App\SalidaMedicamento;
use Illuminate\Support\Facades\Auth;

class SalidaMedicamentoDatabase
{
	public static function guardarSalidaMedicamento($idMedicamento, $idBeneficiario)
	{
        $salidaMedicamento = new SalidaMedicamento();
        $salidaMedicamento->tb_medicamentos_id_medicamento = $idMedicamento;
        $salidaMedicamento->tb_fecha_salida_medicamento = date("Y-m-d");
    	$salidaMedicamento->tb_beneficiarios_id_beneficiario= $idBeneficiario;
    	$salidaMedicamento->save();
	}
}