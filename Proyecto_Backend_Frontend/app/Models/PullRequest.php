<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PullRequest extends Model
{
    protected $table = 'tbl_pull_requests';
    
    public $timestamps = false;
    
    protected $fillable = [
        'codigo_repositorio',
        'codigo_usuario',
        'titulo',
        'descripcion',
        'estado',
        'fecha_creacion'
    ];

    public function repositorio()
    {
        return $this->belongsTo(Repositorio::class, 'codigo_repositorio', 'codigo_repositorio');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'codigo_usuario', 'codigo_usuario');
    }
} 