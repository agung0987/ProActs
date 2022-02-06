<?php

namespace App\Exports;

use App\Invoice;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\periode_nilai;

class Export implements FromCollection
{
    use Exportable;

    public function collection()
    {
        
        return periode_nilai::all();
        
    }
}
