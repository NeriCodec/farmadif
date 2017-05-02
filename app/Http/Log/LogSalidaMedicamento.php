<?php

namespace App\Http\Log;

class LogSalidaMedicamento
{
	public static function guardarLogVerificarSalida($idBeneficiario)
	{
		$ruta = "logs/logSalidaMedicamento.txt";

		if(file_exists($ruta))
	    {
	        $archivo = fopen($ruta, "a");
			fwrite($archivo, "============" . date("Y-m-d h:m:s") . "============" . PHP_EOL);
			fwrite($archivo, "Controller: SalidaMedicamentoController" . PHP_EOL);
			fwrite($archivo, "Funcion: verificarSalidaDeMedicamento" . PHP_EOL);
			fwrite($archivo, "Lineas-codigo: 58-68" . PHP_EOL);
			fwrite($archivo, "Verificacion de salida con ID beneficiario { " . $idBeneficiario . " } " . PHP_EOL);
			fwrite($archivo, "Tipo Verificacion: Exitosa" . PHP_EOL);
			fwrite($archivo, "===========================================" . PHP_EOL);
			fclose($archivo);
	    }
	    else
	    {
	        $mensaje = "Debe de crearse el archivo";
	    }
		
	}

	public static function guardarLogSalidaMedicamento($idBeneficiario, $tipoSalida, $cantidad)
	{
		$ruta = "logs/logSalidaMedicamento.txt";

		if(file_exists($ruta))
	    {
	        $archivo = fopen($ruta, "a");
			fwrite($archivo, "============" . date("Y-m-d h:m:s") . "============" . PHP_EOL);
			fwrite($archivo, "Controller: SalidaMedicamentoController" . PHP_EOL);
			fwrite($archivo, "Funcion: agregarMedicamento" . PHP_EOL);
			fwrite($archivo, "Lineas-codigo: 92-134" . PHP_EOL);
			fwrite($archivo, "Verificacion de salida con ID beneficiario { " . $idBeneficiario . " } " . PHP_EOL);
			fwrite($archivo, "Cantidad de medicamento: " . $cantidad . PHP_EOL);
			fwrite($archivo, "Tipo Verificacion: " . $tipoSalida . PHP_EOL);
			fwrite($archivo, "===========================================" . PHP_EOL);
			fclose($archivo);
	    }
	    else
	    {
	        $mensaje = "Debe de crearse el archivo";
	    }
		
	}
}