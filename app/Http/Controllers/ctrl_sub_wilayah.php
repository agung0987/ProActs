<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_wilayah;
use Illuminate\Support\Facades\DB;

class ctrl_sub_wilayah extends Controller
{
    public function pilih_wilayah(Request $request){
        $cari = array($request->caritahun, $request->caribulan, $request->cariwilayah,($request->limit-1)*10);
        // $dtwl = model_wilayah::all();
        $datawil=DB::select('call wilayah_tampil()'); 
        if(empty($request->caritahun) && empty($request->caribulan) && empty($request->cariwilayah)){
            $Data=DB::select('call sp_jml_sub_wilayah(?,?,?,?)',['kosong', 0, 0,0]);
        }else{
            $Data=DB::select('call sp_jml_sub_wilayah(?,?,?,?)',$cari);
        }
        
            // dd($Data);
        $datas = empty($Data) ? 0 : $Data[0]->jmlbaris;
        // dd($datas);
 
        $bagi=intval( $datas / 10);
        // dd($bagi);


        if(($datas % 10) > 0){
        $bagi = $bagi;
        }else{
        $bagi = $bagi+1;
        }
        // dd(isset($bagi));
        $limit= intval($request-> limit);
        // dd($limit);
        // foreach($dtwl as $key => $value){
        //     $total[$key]=DB::select('call sp_jml_sub_wilayah(?)',[$value->nama]);


        // }
        // dd($total);
        return view('wilayah_Sub-pilih',[
            'datawil'=>$datawil,
            'dataSubWil'=>$Data,
            'limit' =>$limit,
            'datas' => intval($bagi)
        ]);
    }





    public function lihat(Request $request){
        // dd($request->input('nama'));
        
        $jumlah = DB::select('call sp_jml_sub_wilayah(?)',[$request->input('nama')]);
        // dd($jumlah);
        $nama=$jumlah[0]->wilayah;
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
