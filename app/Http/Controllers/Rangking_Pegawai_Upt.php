<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Rangking_Pegawai_Upt extends Controller
{
    public function GetRangkingPegawaiUpt(Request $request)
    {
        // dd(empty($request->all()));
        $cari = array($request->caritahun, $request->caribulan, $request->cariwilayah, $request->cariupt, $request->limit);
        // dd($cari);
        $datawil=DB::select('call wilayah_tampil()');
        $dtupt=DB::select('CALL upt_tampil()'); 

        if(empty($request->all())){
            $data = DB::select('call sp_tb_lap_master_penilaian_pegawai_upt(?,?,?,?,?)',["kosong",0,"0","0",100]);
        }else{
            $data = DB::select('call sp_tb_lap_master_penilaian_pegawai_upt(?,?,?,?,?)',$cari);
        }
        // dd($data);
        return view('Rangking_Pegawai_UPT', [
            'data' => $data,
            'datawil'=> $datawil,
            'dtupt' => $dtupt
        ]);
    }
    
}
