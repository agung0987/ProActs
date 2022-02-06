<?php

namespace App\Http\Controllers;

use App\Models\burung_murai;
use Illuminate\Http\Request;

class lineChart extends Controller
{
    public function line(){
        $burung = burung_murai::all();
        // dd($burung);
        // $lele = ikan_lele::all();
        $data = "";
        for ($n=0 ; $n <= count($burung)-1 ; $n++) {
            $nama = $burung[$n]->nama_burung;
            // $data[$n] = intval($burung[$n]->orang_menyukai);
            $data .=$burung[$n]->orang_menyukai.",";
            // $bueungUnique = $burung [$n] ->nama_burung;//$burung->unique('nama');
            // $data[] = [
            //     "name" => $burung [$n] ->nama_burung,
            //     // "data" => [intval($burung[$n]->orang_menyukai)]
            //     "data" => [10,11,2000,29239,2121,3232,12121]
            // ];
            
            // $Tahun[] = [
            //     'categories'=>$burung[$n]->Tahun
            // ];   
        }
        $string = "[{name: '".$nama."',data:[";
        $string .=$data."]}]";
        // dd( $string);
        // dd(json_encode($string));
        return view("chart", [                   
            // "tahun" => json_encode($Tahun),
            "data" => $string
        ]);
    }
}
