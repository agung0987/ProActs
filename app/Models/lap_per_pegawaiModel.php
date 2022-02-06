<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class lap_per_pegawaiModel extends Model
{
    use HasFactory;
    protected $table = 'tb_lap_master_penilaian'; 
    protected $fillable =[   //Struktur tabel yang sifat (accesabble undfillable)
        'tahun',
        'periode',
        'bulan',
        'nip', 
        'nama',
        'pendidikan',
        'gender',
        'jabatan',
        'upt',
        'wilayah',
        'total',
        'sub1',
        'sub2',
        'sub3',
        'sub4',
        'sub5',
        'sub6',
        'sub7',
        ];
}
