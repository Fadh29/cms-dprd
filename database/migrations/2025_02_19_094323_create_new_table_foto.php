<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('galeri', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->string('slug')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->string('url')->nullable();
            $table->json('tags')->nullable();
            $table->date('tanggal_unggah')->nullable();
            $table->date('tanggal_publish_mulai')->nullable();
            $table->date('tanggal_publis_selesai')->nullable();
            $table->integer('status_file')->nullable();
            $table->integer('status_tampil')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galeri');
    }
};
