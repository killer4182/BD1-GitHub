<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repositorio extends Model
{
    protected $table = 'tbl_repositorios';
    
    protected $primaryKey = 'codigo_repositorio';
    
    public $incrementing = false;
    
    protected $fillable = [
        'codigo_repositorio',
        'codigo_usuario',
        'nombre_repositorio',
        'descripcion',
        'visibilidad',
        'fecha_creacion'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'codigo_usuario', 'codigo_usuario');
    }

    public function colaboradores()
    {
        return $this->hasMany(Colaborador::class, 'codigo_repositorio', 'codigo_repositorio');
    }
} 