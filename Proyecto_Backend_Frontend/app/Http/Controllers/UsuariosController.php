<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TBL_USUARIO;

class UsuariosController extends Controller
{
    //dfafdafd

    public function obtenerUsuarios()
    {
        $usuarios = TBL_USUARIO::all();
        return view("verUsuarios", compact("usuarios"));
    }
}
