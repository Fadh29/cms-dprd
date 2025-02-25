<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->integer('status_tampil')->nullable()->default(0)->after('status_articles');
        });

        // Update semua data yang sudah ada agar status_tampil menjadi 0
        DB::table('articles')->update(['status_tampil' => 0]);
    }

    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('status_tampil');
        });
    }
};
