<?php

namespace App;

use Mpociot\Firebase\SyncsWithFirebase;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use SyncsWithFirebase;

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
       $medicamentos  = \DB::select('SELECT id_medicamento, nombre_comercial, nombre_compuesto, solucion_tableta, tipo_contenido, dosis   
        FROM tb_medicamentos');

       return $medicamentos;
    }

    public static function medicamentosDelDonador($idDonador)
    {
        $medicamentosDonador  = \DB::select('select tb_medicamentos.* from tb_entrada_medicamento,tb_medicamentos where tb_medicamentos.id_medicamento=tb_entrada_medicamento.tb_medicamentos_id_medicamento and tb_donadores_id_donador ='.$idDonador);
        return $medicamentosDonador;
    }

    public static function obtineMedicamentoRequeridos(){
        $medicamentosRequeridos = \DB::select('select * from tb_medicamentos where tb_medicamentos.estatus=\'requerido\'');
        return $medicamentosRequeridos;
    }
    public static function medicamentosVencidos(){
        $medicamentos = \DB::select('select * from tb_medicamentos where mes_caducidad < MONTH(NOW())  and anio_caducidad < YEAR(NOW())');
        return $medicamentos;
    }

    public static function salidasMedicamentos(){
        $medicamentos = \DB::select('select * from tb_salida_medicamento,tb_medicamentos,tb_beneficiarios where tb_medicamentos.id_medicamento = tb_salida_medicamento.tb_medicamentos_id_medicamento and tb_beneficiarios.id_beneficiario=tb_salida_medicamento.tb_beneficiarios_id_beneficiario');
        return $medicamentos;
    }

    public static function entradaMedicamentos(){

        $medicamentos = \DB::select('select * from tb_entrada_medicamento,tb_medicamentos,tb_donadores where tb_medicamentos.id_medicamento = tb_entrada_medicamento.tb_medicamentos_id_medicamento and tb_donadores.id_donador = tb_entrada_medicamento.tb_donadores_id_donador');
        return $medicamentos;
    }

    public static function medicamentosProximosVencer(){
        $medicamentos = \DB::select('select *  from tb_medicamentos where anio_caducidad = YEAR(NOW()) and mes_caducidad= MONTH(NOW())');
        return $medicamentos;
    }



}
