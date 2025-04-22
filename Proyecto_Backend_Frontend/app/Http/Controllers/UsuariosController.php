<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    //dfafdafd

    public function obtenerUsuarios()
    {
        $usuarios = Usuario::all();
        return view("verUsuarios", compact("usuarios"));
    }

    public function crearUsuario(Request $request)
    {
        $min = 10000000;
        $max = 99999999;
        $secureRandomNumber = random_int($min, $max);
        $usuario = new Usuario();
        $usuario->codigo_usuario = $secureRandomNumber;
        $usuario->codigo_tipo_usu = 2;
        $usuario->nombre_usuario = $request->nombre;
        $usuario->apellido_usuario = $request->apellido;
        $usuario->contrasenia = $request->contrasenia;
        $usuario->alias = $request->alias;
        $usuario->correo_electronico = $request->correo;
        $usuario->fecha_creacion = now();
        $usuario->save();
        return redirect()->route("verUsuarios");
    }
    
    public function login(Request $request)
    {
        $usuario = Usuario::where("correo_electronico", $request->correo)->first();
        if ($usuario) {
            if ($usuario->contrasenia === $request->contrasenia) {
                // Store user data in session
                session([
                    'user_id' => $usuario->codigo_usuario,
                    'user_name' => $usuario->nombre_usuario,
                    'user_email' => $usuario->correo_electronico,
                    'user_type' => $usuario->codigo_tipo_usu,
                    'is_logged_in' => true
                ]);
                
                return view("inicio");
            }
        }
        return redirect()->route("login")->with('error', 'Credenciales inválidas');
    }   

    public function logout()
    {
        session()->flush();
        return view("landingPage");
    }

    
}
