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
        Schema::create('tbl_tipos_estados_pull', function (Blueprint $table) {
            $table->integer('codigo_estado_pull');
            $table->string('nombre', 200)->nullable();
            $table->string('descripcion', 500)->nullable();

            $table->primary('codigo_estado_pull');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_tipos_estados_pull');
    }
};
