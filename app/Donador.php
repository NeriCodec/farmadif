<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donador extends Model
{
	/**
    * @param $table, nombre de la tabla de la base de datos
    */
    protected $table = 'tb_donadores';

    /**
    * @param $primaryKey, nombre del id de la tabla de la base de datos
    */
    protected $primaryKey = 'id_donador';
    
    /**
    * @param $timestamps, especifica si se requiere fechas en la tabla.
    */
    public	$timestamps	=	false;

    /**
    * Metodo que realiza una busqueda del donador
    * @param $query 
    * @param String nombre, nombre del donador
    * @return $void
    */
    public function scopeBuscarDonador($query, $nombre)
    {
        if(trim($nombre) != "")
        {
            $query->where("nombre", 'LIKE', "%$nombre%");
        }
    }
}
