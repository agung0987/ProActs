<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class modelPenilaianProaktif extends Model
{
    use HasFactory;
    protected $table = 'penilaianproaktif';         //Nama Tabel
    protected $primaryKey = 'id';       //primary key

    protected $fillable =[   //Struktur tabel yang sifat (accesabble undfillable)
    'kuesioner_id',
    'jawaban',
    'rating',
    'nilaiTerbobot',
    'master_id'
    ];
  
}
