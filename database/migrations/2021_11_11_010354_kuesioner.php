<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kuesioner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('kuesioner', function (Blueprint $table) {
                $table->id('id');
                $table->foreignId('kategori_id')->constrained('kategori')->unsigned();                
                $table->string('indikator',250);
                $table->integer('bobot');
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
