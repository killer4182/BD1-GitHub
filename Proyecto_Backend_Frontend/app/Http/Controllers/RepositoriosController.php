<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repositorio;
use App\Models\Branch;
use App\Models\File;
use App\Models\Commit;

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

    public function crearRepositorio(Request $request)
    {
        if (!session('is_logged_in')) {
            return redirect()->route('landingPage');
        }

        $min = 10000000;
        $max = 99999999;
        $secureRandomNumber = random_int($min, $max);

        $repositorio = new Repositorio();
        $repositorio->codigo_repositorio = $secureRandomNumber;
        $repositorio->codigo_usuario = session('user_id');
        $repositorio->nombre_repositorio = $request->nombre;
        $repositorio->descripcion = $request->descripcion;
        $repositorio->visibilidad = $request->visibilidad;
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
}
