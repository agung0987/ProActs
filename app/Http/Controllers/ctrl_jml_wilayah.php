<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\model_wilayah;
use Illuminate\Support\Facades\DB;

class ctrl_jml_wilayah extends Controller
{
    
	

    public function pilih_wilayah(Request $request){
        // dd(empty($request->all()));
        $cari = array($request->caritahun, $request->caribulan, $request->cariwilayah, ($request->limit-1)*10);
        // $dtwl = DB::table('tb_lap_master_penilaian')->get();
        // dd($cari);
        if(empty($request->all())){
            $total=DB::select('call sp_jml_wilayah(?,?,?,?)',['kosong', 0, 0, 0]);  
        }else{
           
            $total=DB::select('call sp_jml_wilayah(?,?,?,?)',$cari);
        }
        // dd($total);
        $datas =  intval(empty($total) ? 0 : $total[0]->jmlbaris);
        // dd($datas);
        $bagi= $datas / 10;
        // dd($bagi);
        $bagi = intval($bagi);
        // dd($bagi);

        // dd($datas%10);
        if(($datas % 10) > 0){
            $bagi = $bagi;
        }else{
            $bagi = $bagi+1;
        }

        $limit =intval($request -> limit);



        $datawil=DB::select('call wilayah_tampil()'); //dropdown
        // $total=DB::select('call sp_jml_wilayah(?,?,?)',$cari);
       return view('wilayah_jml-pilih',[
            'data'=>$total,
            'datawil' => $datawil,
            'limit'=> $limit,
            'datas'=> $bagi
        ]);
    }

    // public function cari(Request $request){
    //     $caritahun = ($request->caritahun== null? 0 : $request->caritahun);
    //     $caribulan = ($request->caribulan== null? 0 : $request->caribulan);
    //     $cariwilayah = ($request->cariwilayah== null? '': $request->cariwilayah);
    //     $wilayah =DB::select('call sp_jml_wilayah(?,?,?)', [$caritahun,$caribulan,$cariwilayah]);
	
    //     $
    // 		// mengambil data dari table pegawai sesuai pencarian data
           
    //         // dd($wilayah);
    // 		// mengirim data pegawai ke view index
	// 	return view('wilayah_jml-pilih',[
    //         'datawil' => $datawil,
    //         'wilayah' => $wilayah
    //     ]);
 
	// }


    /*==============================================================*/
    public function lihat(Request $request){
        // dd($request->input('nama'));
        // dd($request->all());
        
        $jumlah = DB::select('call sp_jml_wilayah(?,?,?,?)',["kosong",0,$request->input('nama'), 0]);
        // dd($jumlah);
        // $nama=$jumlah[0]->wilayah;
        // $data =$jumlah[0]->jumlah;
        // dd($jumlah);
        $data="";
        for ($n=0 ; $n <= count($jumlah)-1 ; $n++) {
            $nama = $jumlah[$n]->wilayah;
            
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
