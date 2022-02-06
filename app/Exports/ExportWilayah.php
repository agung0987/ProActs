<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\model_wilayah;

class ExportWilayah implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return model_wilayah::all();
    }
}
