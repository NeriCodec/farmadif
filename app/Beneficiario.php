<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
	/**
    * @param $table, nombre de la tabla de la base de datos
    */
    protected $table = 'tb_beneficiarios';

    /**
    * @param $primaryKey, nombre del id de la tabla de la base de datos
    */
    protected $primaryKey = 'id_beneficiario';
    
    /**
    * @param $timestamps, especifica si se requiere fechas en la tabla.
    */
    public	$timestamps	=	false;

    /**
    * Metodo que realiza una busqueda del beneficiario
    * @param $query 
    * @param String nombre, nombre del beneficiario
    * @return $void
    */
    public function scopeBuscarBeneficiario($query, $nombre)
    {
        if(trim($nombre) != "")
        {
            $query->where(\DB::raw("CONCAT(nombre, ' ', ap_paterno, ' ', ap_materno)"), 'LIKE', "%$nombre%");
        }
    }

}
