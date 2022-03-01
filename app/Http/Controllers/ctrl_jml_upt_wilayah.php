<?php

namespace App\Http\Controllers;
use App\Models\upt;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ctrl_jml_upt_wilayah extends Controller
{
    public function pilih_wilayah(Request $request){
        // dd($request->all());
        $cari = array($request->caritahun, $request->caribulan, $request->cariwilayah, $request->cariupt,($request->limit-1)*10);
        $dtupt=DB::select('CALL upt_tampill()'); 
        $datawil=DB::select('call wilayah_tampil()'); 

        if(empty($request->caritahun) && empty($request->caribulan) && empty($request->cariwilayah) && empty($request->cariupt)){
        $Data=DB::select('call sp_jml_upt_wilayah(?,?,?,?,?)',['kosong', 0, 0, 0,0]);
        }else{
        $Data=DB::select('call sp_jml_upt_wilayah(?,?,?,?,?)',$cari);
        }

        // dd($Data);
        $datas = empty($Data) ? 0 : $Data[0]->jmlbaris;
        // dd($datas);
        
        $bagi=intval( $datas / 10);
        


        if(($datas % 10) > 0){
            $bagi = $bagi;
        }else{
            $bagi = $bagi+1;
        }
        // dd(isset($bagi));
        $limit= intval($request-> limit);


        return view('upt_wilayah_jml-pilih',[
            'data'=>$Data,
            'datawil' => $datawil,
            'dtupt' => $dtupt,
            'limit' =>$limit,
            'datas' => intval($bagi)
        ]);
    }


    public function lihat(Request $request){
        // dd($request->all());
        
        $jumlah = DB::select('call sp_jml_upt_wilayah(?,?,?,?,?)',['kosong', 0, $request->input('nama'), $request->input('wilayah'),0]);

        dd($jumlah);
        // $nama=$jumlah[0]->wilayah;
        // $data =$jumlah[0]->jumlah;
        // dd($nama);
        $data="";
        for ($n=0 ; $n <= count($jumlah)-1 ; $n++) {
            $nama = $jumlah[$n]->upt."-".$jumlah[$n]->wilayah;
            
            $data .=$jumlah[$n]->jumlah.",";
            
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
