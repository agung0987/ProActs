<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class model_kuesioner extends Model
{
    use HasFactory;
    protected $table = 'kuesioner';         //Nama Tabel
    protected $primaryKey = 'id';       //primary key

    protected $fillable =[   //Struktur tabel yang sifat (accesabble undfillable)
    'kategori_id',
    'indikator',
    'bobot',
    'status'
];
    public function Tokategori(){

        return $this->belongsTo(model_kategori::class);
    }
    public function penilaian(){
        return $this->hasMany(modelPenilaianProaktif::class);
    }
    
}
