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
        // First, drop the existing foreign key constraint
        Schema::table('tbl_files', function (Blueprint $table) {
            $table->dropForeign(['codigo_commit']);
        });

        // Add the new codigo_branch column
        Schema::table('tbl_files', function (Blueprint $table) {
            $table->integer('codigo_branch')->after('codigo_commit');
            $table->foreign('codigo_branch')->references('codigo_branch')->on('tbl_branches');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the new foreign key constraint
        Schema::table('tbl_files', function (Blueprint $table) {
            $table->dropForeign(['codigo_branch']);
            $table->dropColumn('codigo_branch');
        });

        // Restore the original foreign key constraint
        Schema::table('tbl_files', function (Blueprint $table) {
            $table->foreign('codigo_commit')->references('codigo_commit')->on('tbl_commits');
        });
    }
}; 