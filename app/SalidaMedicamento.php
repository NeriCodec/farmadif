<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalidaMedicamento extends Model
{
    protected $table = 'tb_salida_medicamento';

    protected $primaryKey = 'id_salida_medicamento';
    
    public	$timestamps	=	false;
}
