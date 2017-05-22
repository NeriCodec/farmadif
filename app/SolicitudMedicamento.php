<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudMedicamento extends Model
{
    /**
    * @param $table, nombre de la tabla de la base de datos
    */
    protected $table = 'tb_solicitudes';

    /**
    * @param $primaryKey, nombre del id de la tabla de la base de datos
    */
    protected $primaryKey = 'id_solicitud';
    
    /**
    * @param $timestamps, especifica si se requiere fechas en la tabla.
    */
    public	$timestamps	=	false;

    public static function medicamentosDeUnaSolicitud($idSolicitud)
    {
        $medicamentosRequeridos = \DB::select('SELECT nombre_comercial, nombre_compuesto, id_solicitud, estatus_solicitud,
        solucion_tableta, tipo_contenido, dosis, id_solicitud, descripcion, diagnostico, estatus
        FROM tb_medicamentos_requeridos
        INNER JOIN tb_medicamentos
        ON tb_medicamentos_requeridos.tb_medicamentos_id_medicamento = tb_medicamentos.id_medicamento
        INNER JOIN tb_solicitudes
        ON tb_medicamentos_requeridos.tb_solicitudes_id_solicitud = tb_solicitudes.id_solicitud
        WHERE tb_solicitudes_id_solicitud = ' . $idSolicitud);

        return $medicamentosRequeridos;
    }

    public static function medicamentosRequeridos()
    {

        $medicamentosRequeridos = \DB::select('SELECT nombre_comercial, nombre_compuesto, id_solicitud, estatus_solicitud, nombre,
        solucion_tableta, tipo_contenido, dosis, id_solicitud, descripcion, diagnostico, fecha_solicitud, estatus, id_medicamentos_requeridos
        FROM tb_medicamentos_requeridos
        INNER JOIN tb_medicamentos
        ON tb_medicamentos_requeridos.tb_medicamentos_id_medicamento = tb_medicamentos.id_medicamento
        INNER JOIN tb_solicitudes
        ON tb_medicamentos_requeridos.tb_solicitudes_id_solicitud = tb_solicitudes.id_solicitud
        INNER JOIN tb_beneficiarios
        ON tb_medicamentos_requeridos.tb_beneficiarios_id_beneficiario = tb_beneficiarios.id_beneficiario');

        return $medicamentosRequeridos;
        
    }
}
