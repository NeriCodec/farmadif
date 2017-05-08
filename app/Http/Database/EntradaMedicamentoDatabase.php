<?php

namespace App\Http\Database;

use App\EntradaMedicamento;
use App\Medicamento;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EntradaMedicamentoRequest;
use App\Http\Requests\RegistrarMedicamentoRequest;

class EntradaMedicamentoDatabase
{
    /**
    * Permite guardar en la base de datos el donador
    * @param RegistrarDonadorRequest  $request
    * @return void
    */
	public static function guardarEntradaMedicamento(RegistrarMedicamentoRequest $request,$idMedicamento)
	{
        $EntradaMedicamento = new EntradaMedicamento();
    	$EntradaMedicamento->tb_donadores_id_donador = $request->get('idDonador');
        $EntradaMedicamento->tb_medicamentos_id_medicamento = $idMedicamento;
        $EntradaMedicamento->cantidad_medicamento = $request->get('cantidad_re');;
        $EntradaMedicamento->fecha_entrada = date("Y-m-d");
        $EntradaMedicamento->save();

	}
}