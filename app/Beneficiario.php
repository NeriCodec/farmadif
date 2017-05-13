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

    public static function medicamentosDelBeneficiario($idDonador)
    {
        $medicamentosDonador  = \DB::select('SELECT nombre_comercial, nombre_compuesto, num_etiqueta,
        num_folio, mes_caducidad, anio_caducidad, solucion_tableta, tipo_contenido, diagnostico, descripcion
        FROM tb_salida_medicamento
        INNER JOIN tb_medicamentos
        ON tb_salida_medicamento.tb_medicamentos_id_medicamento = tb_medicamentos.id_medicamento
        INNER JOIN tb_salida_verificacion
        ON tb_salida_medicamento.tb_salida_verificacion_id_salida_verificacion =  tb_salida_verificacion.id_salida_verificacion
        WHERE tb_beneficiarios_id_beneficiario = '.$idDonador . ' ORDER BY tb_salida_medicamento.fecha_salida_medicamento DESC');

        return $medicamentosDonador;

    }

}
