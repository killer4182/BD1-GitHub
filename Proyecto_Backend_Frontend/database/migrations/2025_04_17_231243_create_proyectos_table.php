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
        Schema::create('tbl_proyectos', function (Blueprint $table) {
            $table->integer('codigo_proyecto');
            $table->integer('codigo_usuario');
            $table->string('nombre', 200)->nullable();
            $table->text('descripcion')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->integer('codigo_tamanio');

            $table->primary('codigo_proyecto');

            $table->foreign('codigo_tamanio')->references('codigo_tamanio')->on('tbl_tamanio_proyecto');
            $table->foreign('codigo_usuario')->references('codigo_usuario')->on('tbl_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_proyectos');
    }
};
