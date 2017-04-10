<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    protected $table = 'tb_beneficiarios';

    protected $primaryKey = 'id_beneficiario';
    
    public	$timestamps	=	false;
}
