<?php

use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\RepositoriosController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("landingPage");
})->name("landingPage");


Route::get("/login", function () {
    return view("login");
})->name("login");

Route::get("/register", function () {
    return view("register");
})->name("register");

Route::post("/verifyLogin", [UsuariosController::class, "login"])->name("verifyLogin");
Route::post("/hacerRegistro", [UsuariosController::class, "crearUsuario"])->name("hacerRegistro");

Route::get("/inicio", [UsuariosController::class, "inicio"])->name("inicio");
Route::get("/repositorios", [RepositoriosController::class, "obtenerRepositorios"])->name("repositorios");
Route::get("/repositorio/crear", [RepositoriosController::class, "mostrarFormularioCrear"])->name("mostrarFormularioCrear");
Route::post("/repositorio/guardar", [RepositoriosController::class, "crearRepositorio"])->name("guardarRepositorio");
Route::get("/repositorio/{codigo}", [RepositoriosController::class, "verRepositorio"])->name("verRepositorio");
Route::get("/repositorio/{codigo}/colaboradores/agregar", [RepositoriosController::class, "mostrarFormularioColaborador"])->name("agregarColaborador");
Route::post("/repositorio/{codigo}/colaboradores/guardar", [RepositoriosController::class, "agregarColaborador"])->name("guardarColaborador");
Route::get("/archivo/{codigo}", [RepositoriosController::class, "verArchivo"])->name("verArchivo");
Route::get("/archivo/{codigo}/editar", [RepositoriosController::class, "editarArchivo"])->name("editarArchivo");
Route::post("/archivo/{codigo}/actualizar", [RepositoriosController::class, "actualizarArchivo"])->name("actualizarArchivo");
Route::post("/crear-repositorio", [RepositoriosController::class, "crearRepositorio"])->name("crearRepositorio");
Route::get("/archivo/crear/{codigo_branch}", [RepositoriosController::class, "crearArchivo"])->name("crearArchivo");
Route::post("/archivo/guardar", [RepositoriosController::class, "guardarArchivo"])->name("guardarArchivo");
Route::get("/branch/crear/{codigo_repositorio}", [RepositoriosController::class, "crearBranch"])->name("crearBranch");
Route::post("/branch/guardar", [RepositoriosController::class, "guardarBranch"])->name("guardarBranch");

Route::get("/logout", [UsuariosController::class, "logout"])->name("logout");   
Route::delete("/cuenta/borrar", [UsuariosController::class, "borrarCuenta"])->name("borrarCuenta");
