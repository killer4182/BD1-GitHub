<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    protected $table = 'tbl_colaboradores';
    
    protected $primaryKey = ['codigo_usuario', 'codigo_repositorio'];
    
    public $incrementing = false;
    
    protected $fillable = [
        'codigo_usuario',
        'codigo_repositorio',
        'codigo_rol'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'codigo_usuario', 'codigo_usuario');
    }

    public function repositorio()
    {
        return $this->belongsTo(Repositorio::class, 'codigo_repositorio', 'codigo_repositorio');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'codigo_rol', 'codigo_rol');
    }
} 