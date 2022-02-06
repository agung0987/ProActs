<?php

namespace App\Imports;

use App\Models\upt;
use Maatwebsite\Excel\Concerns\ToModel;

class Import_Upt implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new upt([
            'kode'=> $row[1],
            'nama'=> $row[2],
            'alamat'=> $row[3],
            'email'=> $row[4],
            'no_telp'=> $row[5],
            'id_wilayah'=> $row[6],
        ]);
    }
}
