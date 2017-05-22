<?php

namespace App\Http\Database;

use App\MedicamentoRequerido;

class MedicamentoRequeridoDatabase
{
	public static function guardarMedicamentoRequerido($idMedicamento, $idSolicitud, $idBeneficiario)
	{
		$medicamentoRequerido = new MedicamentoRequerido();
		$medicamentoRequerido->tb_medicamentos_id_medicamento = $idMedicamento;
		$medicamentoRequerido->tb_solicitudes_id_solicitud = $idSolicitud;
		$medicamentoRequerido->tb_beneficiarios_id_beneficiario = $idBeneficiario;
		$medicamentoRequerido->estatus_solicitud = 'solicitado';
        $medicamentoRequerido->save();
	}
}