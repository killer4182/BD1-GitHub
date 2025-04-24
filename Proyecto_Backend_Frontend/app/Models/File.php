<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'tbl_files';
    
    protected $primaryKey = 'codigo_file';
    
    public $incrementing = false;
    
    public $timestamps = false;
    
    protected $fillable = [
        'codigo_file',
        'codigo_branch',
        'codigo_commit',
        'nombre_file',
        'extension_name_file',
        'fecha'
    ];

    protected $casts = [
        'fecha' => 'datetime'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'codigo_branch', 'codigo_branch');
    }

    public function commit()
    {
        return $this->belongsTo(Commit::class, 'codigo_commit', 'codigo_commit');
    }
} 