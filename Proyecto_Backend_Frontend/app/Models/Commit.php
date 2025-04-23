<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commit extends Model
{
    protected $table = 'tbl_commits';
    
    protected $primaryKey = 'codigo_commit';
    
    public $incrementing = false;
    
    protected $fillable = [
        'codigo_commit',
        'codigo_usuario',
        'codigo_repositorio',
        'mensaje',
        'fecha'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'codigo_usuario', 'codigo_usuario');
    }

    public function repositorio()
    {
        return $this->belongsTo(Repositorio::class, 'codigo_repositorio', 'codigo_repositorio');
    }

    public function branches()
    {
        return $this->hasMany(Branch::class, 'codigo_ultimo_commit', 'codigo_commit');
    }
} 