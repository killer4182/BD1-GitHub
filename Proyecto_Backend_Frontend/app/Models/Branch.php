<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'tbl_branches';
    
    protected $primaryKey = 'codigo_branch';
    
    public $incrementing = false;
    
    protected $fillable = [
        'codigo_branch',
        'nombre',
        'codigo_repositorio',
        'codigo_ultimo_commit'
    ];

    public function repositorio()
    {
        return $this->belongsTo(Repositorio::class, 'codigo_repositorio', 'codigo_repositorio');
    }

    public function ultimoCommit()
    {
        return $this->belongsTo(Commit::class, 'codigo_ultimo_commit', 'codigo_commit');
    }

    public function files()
    {
        return $this->hasMany(File::class, 'codigo_branch', 'codigo_branch');
    }
} 