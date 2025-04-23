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
        Schema::create('tbl_files', function (Blueprint $table) {
            $table->integer('codigo_file');
            $table->integer('codigo_commit');
            $table->string('nombre_file', 200);
            $table->string('extension_name_file', 10);
            $table->text('contenido');
            
            $table->primary('codigo_file');
            
            $table->foreign('codigo_commit')->references('codigo_commit')->on('tbl_commits');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_files');
    }
};
