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
        Schema::table('articles', function (Blueprint $table) {
            // Add the new column 'spesial_kategori' as nullable
            $table->string('spesial_kategori')->nullable();
        });

        // Rename the column and change the type in a separate statement
        Schema::table('articles', function (Blueprint $table) {
            // Rename 'tupoksi' to 'super_article' and change the type to LONGTEXT
            $table->renameColumn('tupoksi', 'super_article');
            $table->longText('super_article')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            //
        });
    }
};
