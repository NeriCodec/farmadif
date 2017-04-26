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
}
