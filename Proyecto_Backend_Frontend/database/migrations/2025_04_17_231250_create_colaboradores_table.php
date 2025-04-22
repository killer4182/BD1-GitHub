<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_colaboradores', function (Blueprint $table) {
            $table->integer('codigo_usuario');
            $table->integer('codigo_repositorio');
            $table->integer('codigo_rol');
            
            $table->primary(['codigo_usuario', 'codigo_repositorio']);

            $table->foreign('codigo_repositorio')->references('codigo_repositorio')->on('tbl_repositorios');
            $table->foreign('codigo_rol')->references('codigo_rol')->on('tbl_roles');
            $table->foreign('codigo_usuario')->references('codigo_usuario')->on('tbl_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_colaboradores');
    }
};
