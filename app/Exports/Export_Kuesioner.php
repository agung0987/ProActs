<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\model_kuesioner;

class Export_Kuesioner implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return model_kuesioner::all();
    }
}
