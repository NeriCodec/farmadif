<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerificacionMedicamento extends Model
{
    /**
    * @param $table, nombre de la tabla de la base de datos
    */
    protected $table = 'tb_salida_verificacion';

    /**
    * @param $primaryKey, nombre del id de la tabla de la base de datos
    */
    protected $primaryKey = 'id_salida_verificacion';
    
    /**
    * @param $timestamps, especifica si se requiere fechas en la tabla.
    */
    public	$timestamps	=	false;
}
