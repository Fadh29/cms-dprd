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
        Schema::table('dapil', function (Blueprint $table) {
            $table->unsignedBigInteger('kecamatan_id')->nullable()->change();
            $table->unsignedBigInteger('desa_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('dapil', function (Blueprint $table) {
            $table->unsignedBigInteger('kecamatan_id')->nullable(false)->change();
            $table->unsignedBigInteger('desa_id')->nullable(false)->change();
        });
    }
};
