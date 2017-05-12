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
    		$query->where('nombre_comercial', 'LIKE', "%$medicamento%")->where('estatus', 'existencia');
    	}
    }

    /**
    * Metodo que obtiene los medicamentos para la API
    * @return Array (JSON)
    */
    public static function medicamentosApi()
    {
       $medicamentos  = \DB::select('SELECT id_medicamento, nombre_comercial, nombre_compuesto, solucion_tableta, tipo_contenido, cantidad   
        FROM tb_medicamentos');

       return $medicamentos;
    }


    public static function medicamentosDelDonador($idDonador)
    {
        $medicamentosDonador  = \DB::select('select tb_medicamentos.* from tb_entrada_medicamento,tb_medicamentos where tb_medicamentos.id_medicamento=tb_entrada_medicamento.tb_medicamentos_id_medicamento and tb_donadores_id_donador ='.$idDonador);
        return $medicamentosDonador;
    }


}
