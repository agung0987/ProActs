<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class periode_nilai extends Model
{
    use HasFactory;
    protected $table = 'tb_periode_penilaian';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tahun',
        'periode',
        'bulan',
        'tgl_mulai',
        'tgl_tutup',
        'status'
    ];
}
