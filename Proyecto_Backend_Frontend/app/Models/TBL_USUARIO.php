<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TBL_USUARIO extends Model
{
    protected $table = "TBL_USUARIO";
    protected $primaryKey = "CODIGO_USUARIO";
    public $timestamps = false;
}
