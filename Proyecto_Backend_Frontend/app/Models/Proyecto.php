<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'tbl_proyectos';
    
    public $timestamps = false;
    
    protected $fillable = [
        'codigo_proyecto',
        'codigo_usuario',
        'codigo_tamanio',
        'nombre_proyecto',
        'descripcion',
        'fecha_creacion'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'codigo_usuario', 'codigo_usuario');
    }

    public function tamanio()
    {
        return $this->belongsTo(TamanioProyecto::class, 'codigo_tamanio', 'codigo_tamanio');
    }
} 