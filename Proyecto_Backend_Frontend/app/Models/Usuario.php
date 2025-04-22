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

    public function tipoUsuario()
    {
        return $this->belongsTo(TipoUsuario::class, 'codigo_tipo_usu', 'codigo_tipo_usu');
    }
} 