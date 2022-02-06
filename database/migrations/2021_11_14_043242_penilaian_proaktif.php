<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PenilaianProaktif extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaianProaktif', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('kuesioner_id')->constrained('kuesioner')->unsigned();  
            $table->string('jawaban');
            $table->integer('rating');
            $table->integer('nilaiTerbobot');
            $table->integer('users_id');
           
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
