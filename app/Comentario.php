<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = ['usuario_id', 'publicacion_id', 'comentario'];
}
