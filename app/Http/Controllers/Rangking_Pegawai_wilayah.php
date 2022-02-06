<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Rangking_Pegawai_wilayah extends Controller
{
    public function GetRangkingPegawaiWilayah(Request $request)
    {
        // dd($request->all());
        $cari = array( $request->caritahun, $request->caribulan, $request->cariwilayah, $request->limit );
        $datawil=DB::select('call wilayah_tampil()'); 
        if(empty($request->all())){
            $data = DB::select('call sp_tb_lap_master_penilaian_pegawai_wilayah(?,?,?,?)',['kosong',0,"0",100]);
        }else{
            $data = DB::select('call sp_tb_lap_master_penilaian_pegawai_wilayah(?,?,?,?)',$cari);
        }
       
        // dd($data);
        return view('Rangking_Pegawai_Wilayah', [
            'data' => $data,
            'datawil'=>$datawil
        ]);
    }
}
