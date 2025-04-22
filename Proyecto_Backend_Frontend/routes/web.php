<?php

use App\Http\Controllers\UsuariosController;
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

Route::get("/logout", [UsuariosController::class, "logout"])->name("logout");   
