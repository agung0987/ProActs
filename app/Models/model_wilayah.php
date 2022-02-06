<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_wilayah extends Model
{
    use HasFactory;
    protected $table = 'tb_wilayah';         //Nama Tabel
    protected $primaryKey = 'id';       //primary key

    protected $fillable =[   //Struktur tabel yang sifat (accesabble undfillable)
    'nama',
    'alamat',
    'email',
    'no_telp'
];
}