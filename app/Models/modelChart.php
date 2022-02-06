<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelChart extends Model
{
    use HasFactory;
    protected $table = 'charts';         //Nama Tabel
    protected $primaryKey = 'id';       //primary key

    protected $fillable =[   //Struktur tabel yang sifat (accesabble undfillable)
    'nama',
    'nilai',
    ];
}
