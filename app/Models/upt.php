<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class upt extends Model
{
    use HasFactory;
    protected $table = 'tb_upt';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode',
        'nama',
        'alamat',
        'email',
        'no_telp',
        'id_wilayah'
    ];
}
