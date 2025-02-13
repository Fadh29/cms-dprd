<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateApaSiapaTable extends Migration
{
    public function up()
    {
        Schema::table('apa_siapa', function (Blueprint $table) {
            $table->renameColumn('tanggal_kegiatan', 'tanggal_kegiatan_mulai');
            $table->date('tanggal_kegiatan_selesai')->nullable();
        });
    }

    public function down()
    {
        Schema::table('apa_siapa', function (Blueprint $table) {
            $table->renameColumn('tanggal_kegiatan_mulai', 'tanggal_kegiatan');
            $table->dropColumn('tanggal_kegiatan_selesai');
        });
    }
}
