<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
    * @param $table, nombre de la tabla de la base de datos
    */
    protected $table = 'tb_usuarios';

    /**
    * @param $primaryKey, nombre del id de la tabla de la base de datos
    */
    protected $primaryKey = 'id_usuario';

    /**
    * @param $timestamps, especifica si se requiere fechas en la tabla.
    */
    public  $timestamps =   false;
    
    /**
     * Los atributos que son asignados para el inicio de sesion.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password',
    ];

    /**
     * Atributos que deberian ser ocultos en la base de datos.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
