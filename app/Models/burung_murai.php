<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class burung_murai extends Model
{
    use HasFactory;
    protected $table = 'tb_burung_murai';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_burung',
        'Tahun',
        'orang_menyukai',
    ];
}