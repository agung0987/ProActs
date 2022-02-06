<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formMhsModel extends Model
{
    use HasFactory;
    protected $table = 'tb_form_mhs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nim',
        'nama',
        'alamat',
        'Kelamin',
        'tgl_lahir',
        'hoby',
        'Email',
        'ipk',
        'fakultas',
        'prodi',
        'file',
    ];

}