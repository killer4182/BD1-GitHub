<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'tbl_roles';
    
    protected $primaryKey = 'codigo_rol';
    
    public $incrementing = false;
    
    public $timestamps = false;
    
    protected $fillable = [
        'codigo_rol',
        'rol'
    ];

    public function colaboradores()
    {
        return $this->hasMany(Colaborador::class, 'codigo_rol', 'codigo_rol');
    }
} 