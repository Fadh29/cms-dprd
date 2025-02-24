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
            $table->renameColumn('tupoksi', 'super_article');
            $table->longText('super_article')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rename the 'super_article' column back to 'tupoksi'
        Schema::table('articles', function (Blueprint $table) {
            $table->renameColumn('super_article', 'tupoksi');
            // If you want to change the type back to its original type, you can do it here
            $table->string('tupoksi')->nullable()->change(); // Assuming original type was string
        });

        // Drop the 'spesial_kategori' column
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('spesial_kategori');
        });
    }
};
