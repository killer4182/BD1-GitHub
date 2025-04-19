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
        Schema::create('tbl_usuarios', function (Blueprint $table) {
            $table->integer('codigo_usuario');
            $table->integer('codigo_tipo_usu');
            $table->string('nombre_usuario', 500);
            $table->string('apellido_usuario', 500)->nullable();
            $table->string('contrasenia', 100)->nullable();
            $table->string('alias', 500)->nullable();
            $table->string('correo_electronico', 500)->nullable();
            $table->date('fecha_creacion')->nullable();

            $table->primary('codigo_usuario');

            $table->foreign('codigo_tipo_usu')->references('codigo_tipo_usu')->on('tbl_tipos_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_usuarios');
    }
};
