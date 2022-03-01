<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\lap_per_pegawaiModel;
use Illuminate\Pagination\LengthAwarePaginator;
use PDF;

class lap_per_pegawai extends Controller
{
   public function getlap_master_penilaian(Request $request){
    $cari = array($request->caritahun, $request->caribulan, $request->carinip, ($request->limit-1)*10);
    $query = $request->query();
    $url = $request->url();
    


    if(empty($request->caritahun) && empty($request->caribulan) && empty($request->carinip)){
        $Data= DB::select('call sp_lap_per_pegawai(?,?,?,?)',['kosong', 0,"kosong",0]);
    }else{
        $Data= DB::select('call sp_lap_per_pegawai(?,?,?,?)',$cari);
    }
    // dd($Data);
    
    $datas = empty($Data) ? 0 : $Data[0]->jmlbaris; 
    // dd($datas);
    $bagi= $datas / 10;
    // DD($bagi);
    if(($datas % 10) == 0){
        $bagi = $bagi;
    }else{
        $bagi = $bagi+1;
    }
    // dd(isset($bagi));
    $limit= intval($request-> limit);
    // dd($limit);
    
    return view('pagination_data',[
        'Data' => $Data,
        'datas' => intval($bagi),
        'limit'=> $limit,
        'cari' => $cari,
        'query'=>$query
    ]);
   }
//    function fetch_data(Request $request)
//    {
//     if($request->ajax())
//     {
//      $Data = DB::table('tb_lap_master_penilaian')->paginate(5);
//      return view('pagination', compact('Data'))->render();
//     }
//    }

    public function autocomplete(Request $request)
    {
        
      
        //  $query = $request->get('nip');
        //  $data = DB::select('call pegawai_search(?)',[$query]);

        //  $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = DB::select('call sp_lap_per_pegawai_autocomplete(?)',[$search]);
        }
        return response()->json($data);

          
    }

   function fetch_data(Request $request)
   {
       if ($request->ajax()) {
           $Data = DB::table('tb_lap_master_penilaian')->paginate(5);
           return view('pagination_data', compact('Data'))->render();
       }
   } 

   public function cetak_pdf()
   {
       $pegawai = DB::table('tb_lap_master_penilaian')->get();

    //    $pdf = PDF::loadView('lap_pegawai_pdf',['Data'=>$pegawai])->setPaper('a4', 'landscape');
    //     return $pdf->download('laporan-pegawai-pdf');
    return view('lap_pegawai_pdf',[
        'Data' => $pegawai
    ]);
    //    $pdf = PDF::loadview('lap_pegawai_pdf',['Data'=>$pegawai]);
    //    return $pdf->download('laporan-pegawai-pdf');
    //    return $pdf->download('laporan-pegawai-pdf');
   }
   
}