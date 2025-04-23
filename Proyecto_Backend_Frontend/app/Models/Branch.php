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
        'codigo_repositorio'
    ];

    public function repositorio()
    {
        return $this->belongsTo(Repositorio::class, 'codigo_repositorio', 'codigo_repositorio');
    }

    public function commits()
    {
        return $this->hasMany(Commit::class, 'codigo_branch', 'codigo_branch');
    }

    public function files()
    {
        return $this->hasMany(File::class, 'codigo_branch', 'codigo_branch');
    }
} 