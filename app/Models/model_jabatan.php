<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_jabatan extends Model
{
    use HasFactory;
    protected $table = 'tb_jabatan';         //Nama Tabel
    protected $primaryKey = 'id';       //primary key

    protected $fillable =[   //Struktur tabel yang sifat (accesabble undfillable)
    'nama',
    ];
}
