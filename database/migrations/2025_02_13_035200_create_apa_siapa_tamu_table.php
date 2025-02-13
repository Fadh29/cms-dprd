<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApaSiapaTamuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apa_siapa_tamu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apa_siapa_id')->constrained('apa_siapa')->onDelete('cascade');
            $table->string('badan');
            $table->text('agenda');
            $table->string('akd_terkait')->nullable();
            $table->string('bagian_terkait')->nullable();
            $table->time('jam_mulai')->nullable();
            $table->time('jam_selesai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apa_siapa_tamu');
    }
}
