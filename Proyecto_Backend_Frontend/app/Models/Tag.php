<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tbl_tags';
    
    public $timestamps = false;
    
    protected $fillable = [
        'codigo_repositorio',
        'codigo_commit',
        'nombre_tag',
        'descripcion'
    ];

    public function repositorio()
    {
        return $this->belongsTo(Repositorio::class, 'codigo_repositorio', 'codigo_repositorio');
    }

    public function commit()
    {
        return $this->belongsTo(Commit::class, 'codigo_commit', 'codigo_commit');
    }
} 