<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalidaMedicamento extends Model
{
	/**
    * @param $table, nombre de la tabla de la base de datos
    */
    protected $table = 'tb_salida_medicamento';

    /**
    * @param $primaryKey, nombre del id de la tabla de la base de datos
    */
    protected $primaryKey = 'id_salida_medicamento';
    
    /**
    * @param $timestamps, especifica si se requiere fechas en la tabla.
    */
    public	$timestamps	=	false;

    /**
    * Metodo que obtiene la salida de medicamentos
    * @param $query 
    * @param Int id_salida_verificacion, id
    */
    public static function medicamentosAgregados($id_salida_verificacion)
    {

       $medicamentosAgregados  = \DB::select('SELECT id_medicamento, id_salida_medicamento, nombre_comercial, nombre_compuesto, num_etiqueta, 
                    num_folio, mes_caducidad, anio_caducidad, solucion_tableta, tipo_contenido, dosis, cantidad_medicamento
                    FROM tb_salida_medicamento
                    INNER JOIN tb_medicamentos
                    ON tb_salida_medicamento.tb_medicamentos_id_medicamento = tb_medicamentos.id_medicamento
                    WHERE tb_salida_verificacion_id_salida_verificacion = ' . $id_salida_verificacion);

       return $medicamentosAgregados;
    }
}
