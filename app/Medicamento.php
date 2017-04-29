<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
	/**
    * @param $table, nombre de la tabla de la base de datos
    */
    protected $table = 'tb_medicamentos';

    /**
    * @param $primaryKey, nombre del id de la tabla de la base de datos
    */
    protected $primaryKey = 'id_medicamento';
    
    /**
    * @param $timestamps, especifica si se requiere fechas en la tabla.
    */
    public	$timestamps	=	false;

    /**
    * Metodo que realiza una busqueda del medicamento
    * @param $query 
    * @param String nombre, nombre comercial del medicamento
    * @return $void
    */
    public function scopeBuscarMedicamento($query, $medicamento)
    {
    	if (trim($medicamento) != "") {
    		$query->where('nombre_comercial', 'LIKE', "%$medicamento%");
    	}
    }
}
