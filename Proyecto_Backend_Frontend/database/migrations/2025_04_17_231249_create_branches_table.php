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
        Schema::create('tbl_branches', function (Blueprint $table) {
            $table->integer('codigo_branch');
            $table->string('nombre', 200)->nullable();
            $table->integer('codigo_repositorio');
            $table->integer('codigo_ultimo_commit');

            $table->primary('codigo_branch');

            $table->foreign('codigo_ultimo_commit')->references('codigo_commit')->on('tbl_commits');
            $table->foreign('codigo_repositorio')->references('codigo_repositorio')->on('tbl_repositorios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_branches');
    }
};
