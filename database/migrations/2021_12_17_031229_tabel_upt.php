1<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelUpt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_upt', function (Blueprint $table) {
            $table->id();
            $table-> char ('kode', 10);
            $table-> string ('nama', 100);
            $table-> string ('alamat', 255);
            $table-> string ('email', 100);
            $table-> string ('no_telp', 15);
            $table-> integer ('id_wilayah');

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
