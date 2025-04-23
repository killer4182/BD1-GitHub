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
        Schema::create('tbl_commits', function (Blueprint $table) {
            $table->integer('codigo_commit');
            $table->integer('codigo_usuario');
            $table->integer('codigo_branch');
            $table->text('mensaje')->nullable();
            $table->date('fecha')->nullable();

            $table->primary('codigo_commit');

            $table->foreign('codigo_usuario')->references('codigo_usuario')->on('tbl_usuarios');
            $table->foreign('codigo_branch')->references('codigo_branch')->on('tbl_branches');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_commits');
    }
};
