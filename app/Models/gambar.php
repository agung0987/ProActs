<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gambar extends Model
{
    use HasFactory;
    protected $table = 'uplod';         //Nama Tabel
    protected $primaryKey = 'id';       //primary key

    protected $fillable =[   //Struktur tabel yang sifat (accesabble undfillable)
    'file',
    'keterangan'
    ];
}
