<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\modelChart;
use Illuminate\Http\Request;

class ctrlChart extends Controller
{
    public function cobacrud(){
        $data = modelChart::all();
        // $cobacrud = DB::raw("SELECT * FROM `cobacrud` WHERE 1");
            
        return view("chart", [
            "data" => $data,
        ]);
    }

}
