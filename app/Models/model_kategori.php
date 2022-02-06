<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';         //Nama Tabel
    protected $primaryKey = 'id';       //primary key

    protected $fillable =[   //Struktur tabel yang sifat (accesabble undfillable)
    'kategori',
    ];
    public function Tokuesioner(){
        return $this->hasMany(model_kuesioner::class);
    }
}
