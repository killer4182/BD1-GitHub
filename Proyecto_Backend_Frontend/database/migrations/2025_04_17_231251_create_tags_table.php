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
        Schema::create('tbl_tags', function (Blueprint $table) {
            $table->integer('codigo_tag');
            $table->integer('codigo_repositorio');
            $table->integer('codigo_commit');
            $table->string('nombre', 200)->nullable();

            $table->primary('codigo_tag');

            $table->foreign('codigo_commit')->references('codigo_commit')->on('tbl_commits');
            $table->foreign('codigo_repositorio')->references('codigo_repositorio')->on('tbl_repositorios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_tags');
    }
};
