<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguidor extends Model
{
    protected $fillable = ['enviador', 'receptor'];

    protected $table = 'seguidores';
}
