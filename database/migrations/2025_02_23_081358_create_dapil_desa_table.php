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
        Schema::create('dapil_desa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dapil_id')->constrained('dapil')->onDelete('cascade');
            $table->foreignId('desa_id')->constrained('mst_desa')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dapil_desa');
    }
};
