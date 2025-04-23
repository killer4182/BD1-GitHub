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
        'codigo_branch',
        'mensaje',
        'fecha'
    ];

    protected $casts = [
        'fecha' => 'datetime'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'codigo_usuario', 'codigo_usuario');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'codigo_branch', 'codigo_branch');
    }

    public function files()
    {
        return $this->hasMany(File::class, 'codigo_commit', 'codigo_commit');
    }
} 