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
        Schema::create('tbl_tipos_usuarios', function (Blueprint $table) {
            $table->integer('codigo_tipo_usu');
            $table->string('nombre_tipo', 200)->nullable();

            $table->primary('codigo_tipo_usu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_tipos_usuarios');
    }
};
