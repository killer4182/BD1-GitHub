<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repositorio extends Model
{
    protected $table = 'tbl_repositorios';
    
    protected $primaryKey = 'codigo_repositorio';
    
    public $incrementing = false;
    
    public $timestamps = false;
    
    protected $fillable = [
        'codigo_repositorio',
        'codigo_usuario',
        'nombre_repositorio',
        'descripcion',
        'visibilidad',
        'fecha_creacion'
    ];

    protected $casts = [
        'fecha_creacion' => 'datetime'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'codigo_usuario', 'codigo_usuario');
    }

    public function colaboradores()
    {
        return $this->hasMany(Colaborador::class, 'codigo_repositorio', 'codigo_repositorio');
    }

    public function branches()
    {
        return $this->hasMany(Branch::class, 'codigo_repositorio', 'codigo_repositorio');
    }

    public function tags()
    {
        return $this->hasMany(Tag::class, 'codigo_repositorio', 'codigo_repositorio');
    }

    public function issues()
    {
        return $this->hasMany(Issue::class, 'codigo_repositorio', 'codigo_repositorio');
    }

    public function pullRequests()
    {
        return $this->hasMany(PullRequest::class, 'codigo_repositorio', 'codigo_repositorio');
    }
} 