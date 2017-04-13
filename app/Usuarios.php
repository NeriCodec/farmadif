<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    //
    protected $table = 'tb_usuarios';

    protected $primaryKey = 'id_usuario';
    
    public	$timestamps	=	false;
}
