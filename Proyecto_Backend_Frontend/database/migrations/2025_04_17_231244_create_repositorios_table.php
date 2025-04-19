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
        Schema::create('tbl_repositorios', function (Blueprint $table) {
            $table->integer('codigo_repositorio');
            $table->integer('codigo_usuario');
            $table->string('nombre_repositorio', 200)->nullable();
            $table->text('descripcion')->nullable();
            $table->char('visibilidad', 1)->nullable(); // Assuming visibilidad can be nullable
            $table->date('fecha_creacion')->nullable(); // Assuming date can be nullable

            $table->primary('codigo_repositorio');

            $table->foreign('codigo_usuario')->references('codigo_usuario')->on('tbl_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_repositorios');
    }
};
