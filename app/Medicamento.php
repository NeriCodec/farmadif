<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $table = 'tb_medicamentos';

    protected $primaryKey = 'id_medicamento';
    
    public	$timestamps	=	false;
}
