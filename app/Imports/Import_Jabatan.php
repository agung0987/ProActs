<?php

namespace App\Imports;

use App\Models\model_jabatan;
use Maatwebsite\Excel\Concerns\ToModel;

class Import_Jabatan implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new model_jabatan([
            'nama'=> $row[1],
        ]);
    }
}
