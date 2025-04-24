<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'tbl_usuarios';
    protected $primaryKey = 'codigo_usuario';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'codigo_usuario',
        'codigo_tipo_usu',
        'nombre_usuario',
        'apellido_usuario',
        'contrasenia',
        'alias',
        'correo_electronico',
        'fecha_creacion'
    ];

    protected $hidden = [
        'contrasenia'
    ];

    protected $casts = [
        'fecha_creacion' => 'datetime'
    ];

    public function tipoUsuario()
    {
        return $this->belongsTo(TipoUsuario::class, 'codigo_tipo_usu', 'codigo_tipo_usu');
    }

    public function repositorios()
    {
        return $this->hasMany(Repositorio::class, 'codigo_usuario', 'codigo_usuario');
    }

    public function colaboraciones()
    {
        return $this->hasMany(Colaborador::class, 'codigo_usuario', 'codigo_usuario');
    }

    public function issues()
    {
        return $this->hasMany(Issue::class, 'codigo_usuario', 'codigo_usuario');
    }

    public function pullRequests()
    {
        return $this->hasMany(PullRequest::class, 'codigo_usuario', 'codigo_usuario');
    }

    public function commits()
    {
        return $this->hasMany(Commit::class, 'codigo_usuario', 'codigo_usuario');
    }

    public function proyectos()
    {
        return $this->hasMany(Proyecto::class, 'codigo_usuario', 'codigo_usuario');
    }
} 