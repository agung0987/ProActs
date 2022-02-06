<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FormMhs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('tb_form_mhs', function (Blueprint $table) {
            $table->id();
            $table-> string ('nim',100);
            $table-> string ('nama', 100);
            $table-> string ('alamat', 100);
            $table-> Char    ('Kelamin');
            $table-> date    ('tgl_lahir');
            $table-> string ('hoby', 100);
            $table-> string ('Email', 100);
            $table-> string ('ipk', 100);
            $table-> string ('fakultas', 100);
            $table-> string ('prodi', 100);
            $table-> string ('file', 100);

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