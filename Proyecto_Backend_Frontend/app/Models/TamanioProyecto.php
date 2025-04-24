<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TamanioProyecto extends Model
{
    protected $table = 'tbl_tamanio_proyecto';
    
    public $timestamps = false;
    
    protected $fillable = [
        'codigo_tamanio',
        'nombre_tamanio',
        'descripcion'
    ];
} 