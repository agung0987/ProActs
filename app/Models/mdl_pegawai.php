<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mdl_pegawai extends Model
{
    use HasFactory;
    protected $table = 'tb_pegawai';         //Nama Tabel
    protected $primaryKey = 'id';       //primary key

    protected $fillable =[   //Struktur tabel yang sifat (accesabble undfillable)
    'nip',
    'nama',
    'TTL',
    'pendidikan', 
    'gender',
    'id_jabatan',
    'id_upt',
    'id_wilayah',
    'no_telp',
    'id_atasan'
    ];
}
