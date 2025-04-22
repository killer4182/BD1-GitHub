<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table = 'tbl_tipos_usuarios';
    protected $primaryKey = 'codigo_tipo_usu';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'codigo_tipo_usu',
        'nombre_tipo'
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'codigo_tipo_usu', 'codigo_tipo_usu');
    }
} 