<?php

namespace App\Http\Controllers;
use App\Models\periode_nilai;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;

class ctrl_proses_penilaian extends Controller
{
    public function tampil(Request $request)
    {
        $up = periode_nilai::orderBy('id', 'DESC')->get();

        return view('Proses_periode-tampil',['data' => $up]);
    }
    public function proses(Request $request)
    {

        $_id_periode=$request->input('_id_periode');
        // dd($_id_periode);
        DB::select('call sp_tb_lap_master_penilaian(?)',[$_id_periode]);
        Session::flash('sukses','Proses Akhir Penilain Berhasil Dilakaukan !');

        return redirect()->route('Proses-Akhir-Penilaian');
    }
}
