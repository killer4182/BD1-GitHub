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
Route::get("/repositorio/{codigo}", [RepositoriosController::class, "verRepositorio"])->name("verRepositorio");
Route::get("/archivo/{codigo}", [RepositoriosController::class, "verArchivo"])->name("verArchivo");
Route::get("/archivo/{codigo}/editar", [RepositoriosController::class, "editarArchivo"])->name("editarArchivo");
Route::put("/archivo/{codigo}", [RepositoriosController::class, "actualizarArchivo"])->name("actualizarArchivo");
Route::post("/crear-repositorio", [RepositoriosController::class, "crearRepositorio"])->name("crearRepositorio");

Route::get("/logout", [UsuariosController::class, "logout"])->name("logout");   
