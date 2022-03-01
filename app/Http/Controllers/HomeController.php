<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function check()
    {
        // $getRole = 
        // // dd($getRole);
        return redirect()->route((Auth::user()->hakAkses == 1 ? 'home' : 'home2'));
    }

    public function user(){
        $data = DB::select('call sp_home_user(?)', [(Auth::user()->id_pegawai)]);
        // dd($data);
        // dd($data);
        // $data = $data[0];
        
        return view('home_user', [
            'data'=>$data
        ]);
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        


        // chart untuk wilayah
        $wilayah=DB::select('call sp_jml_wilayah(?,?,?,?)',["0", 0, 0, 0]);
        // dd($data);
        $str = "";
        for ($n=0 ; $n <= count($wilayah)-1 ; $n++) {

           
            $str .="{name:'".$wilayah[$n]->wilayah."',data:[".$wilayah[$n]->jumlah."]},";
        }
        $dtwl="[".$str."]";

        //========================================================================================================================


        $rerata_gender = DB::select('CALL sp_jml_gender(?,?,?)',['kosong', 0, 'kosong']);
        // dd($rerata_gender);
        $str_gender= "";
        for ($n=0 ; $n < count($rerata_gender) ; $n++) {
            $str_gender .="{name:'".$rerata_gender[$n]->gender."', y: ".$rerata_gender[$n]->jumlah."},";
        }
         
         $str_gender="[{
            name: 'Gender',
            colorByPoint: true,
            data: [".$str_gender."]}]";
            // dd($str_gender);
        
        // $str_gender = 
       
        //=========================================================================================================================
        // rerata pendidikan
        $rerata_pnd=  DB::select('CALL sp_jml_pendidikan(?,?,?)',['kosong', 0, 0]);
        // dd($rerata_pnd);
        $str_pnd="";
        for ($n=0 ; $n < count($rerata_pnd) ; $n++) {
            $str_pnd .="{name:'".$rerata_pnd[$n]->pendidikan."', data: [".$rerata_pnd[$n]->jumlah."]},";
        }
        
        $str_pnd = "[".$str_pnd."]";

        // dd($str_pnd);

        // ========================================================================================================================
        // chart rerata bulan

        $rerata_bln = DB::select('call sp_jml_bulan(?)',['kosong']);
        // dd($rerata_bln);
        $str_bln = "";
        $str_bln .= "[{name:'". $rerata_bln[0]->bulan ."', data: [".$rerata_bln[0]->jumlah."]}]";
        // dd($str_bln);
        //==========================================================================================================================
	$pegawai = DB::select('call sp_tb_lap_master_penilaian_pegawai_wilayah2(?,?,?)',[0,'', 5]);
        $data=DB::select('call dashboard');
        
        // dd($data);
        return view('home',[
            'str_gender'=>$str_gender,
            'str_pnd'=>$str_pnd,
            'str_bln'=>$str_bln,
            'data'=>$data,
            'dtwl'=>$dtwl,
            'pegawai'=>$pegawai

        ]);
    }
}