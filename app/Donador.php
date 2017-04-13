<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donador extends Model
{
    protected $table = 'tb_donadores';

    protected $primaryKey = 'id_donador';
    
    public	$timestamps	=	false;
}
