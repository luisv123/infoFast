<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $fillable = ['contenido','adjunto','id_user','id_user_original'];

    protected $table = 'publicaciones';
}
