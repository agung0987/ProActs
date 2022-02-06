<?php

namespace App\Imports;

use App\Models\model_kategori;
use Maatwebsite\Excel\Concerns\ToModel;

class Import_Kategori implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new model_kategori([
            'kategori'=>$row[1]
        ]);
    }
}
