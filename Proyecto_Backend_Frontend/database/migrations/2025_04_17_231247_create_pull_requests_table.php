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
        Schema::create('tbl_pull_requests', function (Blueprint $table) {
            $table->integer('codigo_pull_request');
            $table->integer('codigo_usuario');
            $table->integer('codigo_estado_pull');
            $table->integer('codigo_repositorio');
            $table->string('titulo', 500)->nullable();
            $table->text('descripcion')->nullable();

            $table->primary('codigo_pull_request');

            $table->foreign('codigo_repositorio')->references('codigo_repositorio')->on('tbl_repositorios');
            $table->foreign('codigo_usuario')->references('codigo_usuario')->on('tbl_usuarios');
            $table->foreign('codigo_estado_pull')->references('codigo_estado_pull')->on('tbl_tipos_estados_pull');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pull_requests');
    }
};
