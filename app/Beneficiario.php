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
        $medicamentosDonador  = \DB::select('SELECT nombre_comercial, nombre_compuesto, num_etiqueta, id_medicamento,
        num_folio, mes_caducidad, anio_caducidad, solucion_tableta, tipo_contenido, diagnostico, descripcion, dosis
        FROM tb_salida_medicamento
        INNER JOIN tb_medicamentos
        ON tb_salida_medicamento.tb_medicamentos_id_medicamento = tb_medicamentos.id_medicamento
        INNER JOIN tb_solicitudes
        ON tb_salida_medicamento.tb_salida_verificacion_id_salida_verificacion =  tb_solicitudes.id_solicitud
        WHERE tb_beneficiarios_id_beneficiario = '.$idDonador . ' ORDER BY tb_salida_medicamento.fecha_salida_medicamento DESC');

        return $medicamentosDonador;

    }

    public static function medicamentosRequeridosPorUnBeneficiario($idBeneficiario, $idSolicitud)
    {
        $medicamentosRequeridos = \DB::select('SELECT nombre_comercial, nombre_compuesto, num_etiqueta,
        num_folio, mes_caducidad, anio_caducidad, solucion_tableta, tipo_contenido, dosis, id_medicamentos_requeridos, id_medicamento
        FROM tb_medicamentos_requeridos
        INNER JOIN tb_medicamentos
        ON tb_medicamentos_requeridos.tb_medicamentos_id_medicamento = tb_medicamentos.id_medicamento
        INNER JOIN tb_solicitudes
        ON tb_medicamentos_requeridos.tb_solicitudes_id_solicitud = tb_solicitudes.id_solicitud
        WHERE tb_beneficiarios_id_beneficiario = ' . $idBeneficiario . '
        AND tb_solicitudes.id_solicitud =' . $idSolicitud );

        return $medicamentosRequeridos;
    }

    public static function medicamentosRequeridosPorUnBeneficiarioId($idBeneficiario)
    {
        $medicamentosRequeridos = \DB::select('SELECT nombre_comercial, nombre_compuesto, id_solicitud, estatus_solicitud,
        solucion_tableta, tipo_contenido, dosis, id_solicitud, descripcion, diagnostico, num_folio, estatus
        FROM tb_medicamentos_requeridos
        INNER JOIN tb_medicamentos
        ON tb_medicamentos_requeridos.tb_medicamentos_id_medicamento = tb_medicamentos.id_medicamento
        INNER JOIN tb_solicitudes
        ON tb_medicamentos_requeridos.tb_solicitudes_id_solicitud = tb_solicitudes.id_solicitud
        WHERE tb_beneficiarios_id_beneficiario = ' . $idBeneficiario);

        return $medicamentosRequeridos;
    }

    /**
    * Metodo que realiza una busqueda del beneficiario
    * @param $query 
    * @param String nombre, nombre comercial del medicamento
    * @return $void
    */
    public static function buscarBeneficiarioLogin($usuario, $contrasenia)
    {

        $beneficiario = \DB::select("SELECT usuario, id_beneficiario
        FROM tb_beneficiarios
        WHERE usuario = '" . $usuario . "' AND contrasenia = '" . $contrasenia ."'");

        return $beneficiario;
    }

}
