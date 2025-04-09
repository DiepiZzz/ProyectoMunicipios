<?php

namespace Modelos\Entidades;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    protected $fillable = ['username', 'password', 'nombre', 'email', 'reset_token'];
}
