<?php

namespace App\Imports;

use App\Models\model_kuesioner;
use Maatwebsite\Excel\Concerns\ToModel;

class Import_kuesioner implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new model_kuesioner([
            'kategori_id'=> $row[1],
            'indikator'=> $row[2],
            'bobot'=> $row[3],
            'status' => $row[4],
        ]);
    }
}
