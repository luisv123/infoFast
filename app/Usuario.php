<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['nombre','apellido','edad', 'idioma', 'pw', 'usuario', 'modo', 'color', 'foto_perfil', 'fondo_perfil'];
}
