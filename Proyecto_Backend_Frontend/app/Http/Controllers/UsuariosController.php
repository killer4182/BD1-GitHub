<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Repositorio;
use App\Models\Colaborador;
use App\Models\Commit;
use App\Models\Issue;
use App\Models\PullRequest;
use App\Models\Proyecto;

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
        return redirect()->route("login");
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
                
                return redirect()->route('inicio');
            }
        }
        return redirect()->route("login")->with('error', 'Credenciales inválidas');
    }   

    public function logout()
    {
        session()->flush();
        return view("landingPage");
    }

    public function inicio()
    {
        if (!session('is_logged_in')) {
            return redirect()->route('landingPage');
        }
        return view('inicio');
    }

    public function getRepositorios()
    {
        if (!session('is_logged_in')) {
            return redirect()->route('landingPage');
        }

        $userId = session('user_id');
        
        // Get repositories where the user is the owner
        $repositoriosPropios = Repositorio::where('codigo_usuario', $userId)->get();
        
        // Get repositories where the user is a collaborator
        $repositoriosColaboracion = Repositorio::whereHas('colaboradores', function($query) use ($userId) {
            $query->where('codigo_usuario', $userId);
        })->get();
        
        // Merge both collections
        $repositorios = $repositoriosPropios->merge($repositoriosColaboracion);
        
        return view('repositorios', compact('repositorios'));
    }

    public function verRepositorio($codigo)
    {
        if (!session('is_logged_in')) {
            return redirect()->route('landingPage');
        }

        // Store the selected repository code in the session
        session(['selected_repository' => $codigo]);

        // Get the repository details
        $repositorio = Repositorio::where('codigo_repositorio', $codigo)->first();

        if (!$repositorio) {
            return redirect()->route('repositorios')->with('error', 'Repositorio no encontrado');
        }

        return view('verRepositorio', compact('repositorio'));
    }

    public function borrarCuenta()
    {
        if (!session('is_logged_in')) {
            return redirect()->route('landingPage');
        }

        $userId = session('user_id');

        // Get all repositories owned by the user
        $repositorios = Repositorio::where('codigo_usuario', $userId)->get();

        foreach ($repositorios as $repositorio) {
            // Delete files and their commits for each branch
            foreach ($repositorio->branches as $branch) {
                // Delete files and their commits
                foreach ($branch->files as $file) {
                    // Delete tags associated with the commit first
                    if ($file->commit) {
                        $file->commit->tags()->delete();
                        $file->commit->delete();
                    }
                    $file->delete();
                }
                // Delete the branch
                $branch->delete();
            }

            // Delete issues associated with the repository
            $repositorio->issues()->delete();

            // Delete pull requests associated with the repository
            $repositorio->pullRequests()->delete();

            // Delete tags associated with the repository
            $repositorio->tags()->delete();

            // Delete collaborations for this repository
            $repositorio->colaboradores()->delete();

            // Delete the repository
            $repositorio->delete();
        }

        // Delete user's collaborations in other repositories
        Colaborador::where('codigo_usuario', $userId)->delete();

        // Delete user's commits
        Commit::where('codigo_usuario', $userId)->delete();

        // Delete user's issues
        Issue::where('codigo_usuario', $userId)->delete();

        // Delete user's pull requests
        PullRequest::where('codigo_usuario', $userId)->delete();

        // Delete user's projects
        Proyecto::where('codigo_usuario', $userId)->delete();

        // Delete the user
        Usuario::where('codigo_usuario', $userId)->delete();

        // Clear the session
        session()->flush();

        return redirect()->route('landingPage')->with('success', 'Tu cuenta ha sido eliminada exitosamente');
    }
}
