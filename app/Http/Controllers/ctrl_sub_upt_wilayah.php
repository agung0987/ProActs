<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ctrl_sub_upt_wilayah extends Controller
{
    public function pilih_wilayah(Request $request){

        $cari = array($request->caritahun, $request->caribulan, $request->cariupt, $request->cariwilayah,($request->limit-1)*10);
        // dd($cari);

        $dtupt=DB::select('CALL upt_tampil()'); 
        $datawil=DB::select('call wilayah_tampil()'); 
        if(empty($request->all())){
            $dataSupUptwil= DB::select('call sp_jml_sub_upt_wilayah(?,?,?,?,?)',['kosong', 0, 0, 0, 0]);
        }else{
            $dataSupUptwil= DB::select('call sp_jml_sub_upt_wilayah(?,?,?,?,?)',$cari);
        }
        
         $datas = empty($dataSupUptwil) ? 0 : $dataSupUptwil[0]->jmlbaris;
        // dd($datas);
        
        $bagi=intval( $datas / 10);
        


        if(($datas % 10) > 0){
            $bagi = $bagi;
        }else{
            $bagi = $bagi+1;
        }
        // dd(isset($bagi));
        $limit= intval($request-> limit);


        return view('upt_wilayah_sub-pilih',[
            // 'data'=>$total
            'dtupt'=>$dtupt,
            'datawil'=>$datawil,
            'dataSupUptwil' => $dataSupUptwil,
            'limit' =>$limit,
            'datas' => intval($bagi)
        ]);
    }


    public function lihat(Request $request){
        // dd($request->all());
        
        $jumlah = DB::select('call sp_jml_sub_upt_wilayah(?,?)',[
            $request->input('nama'),
            $request->input('wilayah'),
        ]);
        // dd($jumlah);    
        $nama=$jumlah[0]->upt."-".$jumlah[0]->wilayah;
        $data="";
// $koma=",";
        $data .=$jumlah[0]->sub1;
        $data .=",".$jumlah[0]->sub2;
        $data .=",".$jumlah[0]->sub3;
        $data .=",".$jumlah[0]->sub4;
        $data .=",".$jumlah[0]->sub5;
        $data .=",".$jumlah[0]->sub6;
        $data .=",".$jumlah[0]->sub7;
        // $data .=$jumlah[0]->sub1;
        // dd($nama);
        // $data="";
        // for ($n=0 ; $n <= count($jumlah)-1 ; $n++) {
        //     $nama = $jumlah[$n]->wilayah;
            
        //     $data .=$jumlah[$n]->jumlah.",";
            
        
        // }
        $string = "[{name: '".$nama."',data:[";
        $string .=$data."]}]";
        // dd( $string);
        // dd(json_encode($string));
        return view("chart_sub_wilayah", [                   
            // "tahun" => json_encode($Tahun),
            'tampil'=>$jumlah,
            "data" => $string
        ]);
    }
}
