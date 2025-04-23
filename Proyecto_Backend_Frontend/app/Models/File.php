<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'tbl_files';
    
    protected $primaryKey = 'codigo_file';
    
    public $incrementing = false;
    
    protected $fillable = [
        'codigo_file',
        'codigo_branch',
        'nombre_file',
        'extension_name_file',
        'contenido'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'codigo_branch', 'codigo_branch');
    }
} 