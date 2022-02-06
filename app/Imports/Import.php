<?php

namespace App\Imports;

use App\Models\periode_nilai;
use Maatwebsite\Excel\Concerns\ToModel;

class Import implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new periode_nilai([
        'tahun'=> $row[1],
        'periode'=> $row[2],
        'bulan'=> $row[3],
        'tgl_mulai' => $row[4],
        'tgl_tutup'=> $row[5],
        'status' => $row[6]
        ]);
    }
}
