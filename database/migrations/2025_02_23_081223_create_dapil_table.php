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
        Schema::create('dapil', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255);
            $table->foreignId('kecamatan_id')->constrained('mst_kecamatan')->onDelete('cascade');
            $table->foreignId('desa_id')->constrained('mst_desa')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dapil');
    }
};
