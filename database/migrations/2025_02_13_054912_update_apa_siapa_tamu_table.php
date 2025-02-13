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
        Schema::table('apa_siapa_tamu', function (Blueprint $table) {
            $table->date('tanggal_tamu_mulai')->nullable();
            $table->date('tanggal_tamu_selesai')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apa_siapa_tamu', function (Blueprint $table) {
            $table->dropColumn('tanggal_tamu_mulai');
            $table->dropColumn('tanggal_tamu_selesai');
        });
    }
};
