<?php

namespace App\Http\Log;

class LogSalidaMedicamento
{
	public static function guardarLog($log)
	{
		$file = fopen("logs/logSalidaMedicamento.txt", "a");
		fwrite($file, "============" . date("Y-m-d h:m:s") . "============" . PHP_EOL);
		fwrite($file, $log . PHP_EOL);
		fwrite($file, "===========================================" . PHP_EOL);
		fclose($file);
	}
}