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
        Schema::create('tbl_tamanio_proyecto', function (Blueprint $table) {
            $table->integer('codigo_tamanio');
            $table->string('nombre', 200)->nullable();
            $table->text('descripcion')->nullable();

            $table->primary('codigo_tamanio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_tamanio_proyecto');
    }
};
