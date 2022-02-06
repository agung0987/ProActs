<?php

namespace App\Imports;

use App\Models\model_wilayah;
use Maatwebsite\Excel\Concerns\ToModel;

class Import_Wilayah implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new model_wilayah([
            'nama'     => $row[1],
            'alamat' => $row[2],
            'email' => $row[3],
            'no_telp' => $row[4]
        ]);
    }
}
