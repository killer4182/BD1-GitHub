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
        // Drop existing foreign key constraints
        Schema::table('tbl_commits', function (Blueprint $table) {
            $table->dropForeign(['codigo_branch']);
        });

        Schema::table('tbl_files', function (Blueprint $table) {
            $table->dropForeign(['codigo_branch']);
        });

        // Add new foreign key constraints with cascade delete
        Schema::table('tbl_commits', function (Blueprint $table) {
            $table->foreign('codigo_branch')
                  ->references('codigo_branch')
                  ->on('tbl_branches')
                  ->onDelete('cascade');
        });

        Schema::table('tbl_files', function (Blueprint $table) {
            $table->foreign('codigo_branch')
                  ->references('codigo_branch')
                  ->on('tbl_branches')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the cascade delete foreign key constraints
        Schema::table('tbl_commits', function (Blueprint $table) {
            $table->dropForeign(['codigo_branch']);
        });

        Schema::table('tbl_files', function (Blueprint $table) {
            $table->dropForeign(['codigo_branch']);
        });

        // Restore original foreign key constraints without cascade delete
        Schema::table('tbl_commits', function (Blueprint $table) {
            $table->foreign('codigo_branch')
                  ->references('codigo_branch')
                  ->on('tbl_branches');
        });

        Schema::table('tbl_files', function (Blueprint $table) {
            $table->foreign('codigo_branch')
                  ->references('codigo_branch')
                  ->on('tbl_branches');
        });
    }
}; 