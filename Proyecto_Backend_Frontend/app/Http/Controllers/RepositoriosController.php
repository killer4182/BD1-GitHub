<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repositorio;
use App\Models\Branch;
use App\Models\File;
use App\Models\Commit;
use App\Models\Usuario;
use App\Models\Colaborador;

class RepositoriosController extends Controller
{
    public function obtenerRepositorios()
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

        // Get the repository with its branches
        $repositorio = Repositorio::with('branches')
            ->where('codigo_repositorio', $codigo)
            ->first();

        if (!$repositorio) {
            return redirect()->route('repositorios')->with('error', 'Repositorio no encontrado');
        }

        return view('verRepositorio', compact('repositorio'));
    }

    public function verArchivo($codigo)
    {
        if (!session('is_logged_in')) {
            return redirect()->route('landingPage');
        }

        $file = File::with(['commit.usuario', 'commit.branch'])
            ->where('codigo_file', $codigo)
            ->first();

        if (!$file) {
            return redirect()->route('repositorios')->with('error', 'Archivo no encontrado');
        }

        return view('verArchivo', compact('file'));
    }

    public function editarArchivo($codigo)
    {
        if (!session('is_logged_in')) {
            return redirect()->route('landingPage');
        }

        $file = File::with(['commit.usuario', 'commit.branch'])
            ->where('codigo_file', $codigo)
            ->first();

        if (!$file) {
            return redirect()->route('repositorios')->with('error', 'Archivo no encontrado');
        }

        return view('editarArchivo', compact('file'));
    }

    public function actualizarArchivo(Request $request, $codigo)
    {
        if (!session('is_logged_in')) {
            return redirect()->route('landingPage');
        }

        $file = File::with(['commit.branch'])->where('codigo_file', $codigo)->first();

        if (!$file) {
            return redirect()->route('repositorios')->with('error', 'Archivo no encontrado');
        }

        // Update file content
        $file->contenido = $request->contenido;
        $file->save();

        // Create new commit
        $min = 10000000;
        $max = 99999999;
        $secureRandomNumber = random_int($min, $max);

        $commit = new Commit();
        $commit->codigo_commit = $secureRandomNumber;
        $commit->codigo_usuario = session('user_id');
        $commit->codigo_branch = $file->commit->codigo_branch;
        $commit->mensaje = $request->mensaje;
        $commit->fecha = now();
        $commit->save();

        // Update file's commit reference
        $file->codigo_commit = $commit->codigo_commit;
        $file->save();

        return redirect()->route('verArchivo', ['codigo' => $file->codigo_file])
            ->with('success', 'Archivo actualizado exitosamente');
    }

    public function mostrarFormularioCrear()
    {
        if (!session('is_logged_in')) {
            return redirect()->route('landingPage');
        }

        return view('crearRepositorio');
    }

    public function crearRepositorio(Request $request)
    {
        if (!session('is_logged_in')) {
            return redirect()->route('landingPage');
        }

        $min = 10000000;
        $max = 99999999;
        $secureRandomNumber = random_int($min, $max);

        // Convert visibility option to single character
        $visibilidad = $request->visibilidad === 'publico' ? 'P' : '0';

        $repositorio = new Repositorio();
        $repositorio->codigo_repositorio = $secureRandomNumber;
        $repositorio->codigo_usuario = session('user_id');
        $repositorio->nombre_repositorio = $request->nombre;
        $repositorio->descripcion = $request->descripcion;
        $repositorio->visibilidad = $visibilidad;
        $repositorio->fecha_creacion = now();
        $repositorio->save();

        // Create a default main branch
        $branch = new Branch();
        $branch->codigo_branch = random_int($min, $max);
        $branch->nombre = 'main';
        $branch->codigo_repositorio = $repositorio->codigo_repositorio;
        $branch->save();

        return redirect()->route('repositorios')->with('success', 'Repositorio creado exitosamente');
    }

    public function crearArchivo($codigo_branch)
    {
        if (!session('is_logged_in')) {
            return redirect()->route('landingPage');
        }

        return view('crearArchivo', compact('codigo_branch'));
    }

    public function guardarArchivo(Request $request)
    {
        if (!session('is_logged_in')) {
            return redirect()->route('landingPage');
        }

        // Generate secure random numbers for new file and commit
        $min = 10000000;
        $max = 99999999;
        $codigo_file = random_int($min, $max);
        $codigo_commit = random_int($min, $max);

        // Create new commit
        $commit = new Commit();
        $commit->codigo_commit = $codigo_commit;
        $commit->codigo_usuario = session('user_id');
        $commit->codigo_branch = $request->codigo_branch;
        $commit->mensaje = $request->mensaje;
        $commit->fecha = now();
        $commit->save();

        // Create new file
        $file = new File();
        $file->codigo_file = $codigo_file;
        $file->codigo_branch = $request->codigo_branch;
        $file->codigo_commit = $codigo_commit;
        $file->nombre_file = $request->nombre_file;
        $file->extension_name_file = $request->extension_name_file;
        $file->contenido = $request->contenido;
        $file->save();

        return redirect()->route('verRepositorio', ['codigo' => session('selected_repository')])
            ->with('success', 'Archivo creado exitosamente');
    }

    public function crearBranch($codigo_repositorio)
    {
        if (!session('is_logged_in')) {
            return redirect()->route('landingPage');
        }

        return view('crearBranch', compact('codigo_repositorio'));
    }

    public function guardarBranch(Request $request)
    {
        if (!session('is_logged_in')) {
            return redirect()->route('landingPage');
        }

        // Generate secure random number for new branch
        $min = 10000000;
        $max = 99999999;
        $codigo_branch = random_int($min, $max);

        // Create new branch
        $branch = new Branch();
        $branch->codigo_branch = $codigo_branch;
        $branch->nombre = $request->nombre;
        $branch->codigo_repositorio = $request->codigo_repositorio;
        $branch->save();

        return redirect()->route('verRepositorio', ['codigo' => $request->codigo_repositorio])
            ->with('success', 'Rama creada exitosamente');
    }

    public function mostrarFormularioColaborador($codigo)
    {
        if (!session('is_logged_in')) {
            return redirect()->route('landingPage');
        }

        $repositorio = Repositorio::findOrFail($codigo);
        return view('agregarColaboradoresARepositorio', compact('repositorio'));
    }

    public function agregarColaborador(Request $request, $codigo)
    {
        if (!session('is_logged_in')) {
            return redirect()->route('landingPage');
        }

        // Validate the request
        $request->validate([
            'usuario' => 'required|string',
            'rol' => 'required|integer|exists:tbl_roles,codigo_rol'
        ]);

        // Find the user by username
        $usuario = Usuario::where('nombre_usuario', $request->usuario)->first();
        
        if (!$usuario) {
            return back()->with('error', 'Usuario no encontrado');
        }

        // Check if user is already a collaborator
        $existingCollaborator = Colaborador::where('codigo_usuario', $usuario->codigo_usuario)
            ->where('codigo_repositorio', $codigo)
            ->first();

        if ($existingCollaborator) {
            return back()->with('error', 'El usuario ya es colaborador de este repositorio');
        }

        // Create new collaborator
        $colaborador = new Colaborador();
        $colaborador->codigo_usuario = $usuario->codigo_usuario;
        $colaborador->codigo_repositorio = $codigo;
        $colaborador->codigo_rol = $request->rol;
        $colaborador->save();

        return redirect()->route('verRepositorio', ['codigo' => $codigo])
            ->with('success', 'Colaborador agregado exitosamente');
    }
}
