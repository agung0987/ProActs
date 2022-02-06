<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablePeriodeNilai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_periode_nilai', function (Blueprint $table) {
            $table->id();
            $table-> integer  ('tahun');
            $table-> integer ('periode');
            $table-> integer ('bulan');
            $table-> date    ('tgl_mulai', 15);
            $table-> date    ('tgl_tutup', 15);
            $table-> integer ('status');
            
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
        //
    }
}
