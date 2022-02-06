<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\modelPenilaianProaktif;
use App\Models\periode_nilai;
use App\Models\model_kuesioner;
use App\Models\upt;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Arr;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use PhpParser\JsonDecoder;

use function GuzzleHttp\Promise\all;

class ctrlPenilaian extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function autocomplete(Request $request)
    {
        
      
        //  $query = $request->get('nip');
        //  $data = DB::select('call pegawai_search(?)',[$query]);

        //  $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = DB::select('call pegawai_search(?)',[$search]);
        }
        return response()->json($data);

          
    }

    public function periode2()
    {
        //    dd( model_kuesioner::all());

        $up = periode_nilai::orderBy('id', 'DESC')->get();

        // dd($up);

        return view('periodePenilaian-pilih', [
            'data' => $up,
        ]);
    }
    public function pegawaiPilih(Request $request)
    {
        // dd($request->all());
        // $request->get('id_periode');
        $id_periode = $request->input('periode');

        $cobacrud = periode_nilai::where('id', $id_periode)->get();
        // dd($cobacrud);

        // pegawai yang menilai
        $user = Auth::user()->id;
        $dtpn = DB::select('CALL penilai(?)', array($user));
        // dd($user);
        // dd($dtpn);
        $id_dtpn = $dtpn[0]->id;
        // dd($id_dtpn);



        $data = array(
            'dtpn' => $dtpn,
            'id_periode' => $id_periode,
            'cobacrud' => $cobacrud
        );
        // dd($data);
        return view('pegawai-pilih', $data);
    }


    public function penilaian(Request $request)
    {
        // dd($request->all());
        $user = Auth::user()->id;
        $dtpn = DB::select('CALL penilai(?)', array($user));

        $pegawai = $request->input('nip');
        $dtpg = DB::select('CALL pegawai(?)', array($pegawai));
        

            $id_dtpg = $dtpg[0]->id;
        // DD($id_dtpg);
        $tampil = DB::select('call sp_coba(?,?,?,?)', [
            $request->input('id_penilai'),
            $id_dtpg,
            $request->input('id_periode'),
            $request->input('status')
        ]);
        // dd($tampil);
        // variabel untuk menampung id yang didapat dari tampil

        $master_id = $tampil[0]->id;
        // $userarray=[$id_user];

        // dd($master_id);
        $cobacrud = DB::select('CALL penilaianproaktif_tampil_id(?,?)', [$master_id, $request->input('status')]);
        $total = DB::select('call total(?)', [$request->input('status')]);
        $count = $total[0]->total;
        $mulai = $total[0]->id;
        $hasil = $mulai + $count;
        // dd($hasil);

        if (count($cobacrud) <= 1) {
            for ($mulai; $mulai < $hasil; $mulai++) {

                modelPenilaianProaktif::Create(
                    [
                        'id' => null,
                        'kuesioner_id' => $mulai,
                        'jawaban' => null,
                        'rating' => null,
                        'master_id' => $master_id,
                        'nilaiTerbobot' => null

                    ]
                );
                $cobacrud = DB::select('CALL penilaianproaktif_tampil_id(?,?)', [$master_id, $request->input('status')]);
            }
        } else {
            $cobacrud = DB::select('CALL penilaianproaktif_tampil_id(?,?)', [$master_id, $request->input('status')]);
        }
        // dd(intval( $master_id));
        DB::select('call update_total(?)', [intval($master_id)]);
        $total = collect($cobacrud)->sum('nilaiTerbobot');
        $data = array(
            'dtpn' => $dtpn,
            'dtpg' => $dtpg,
            'tampil' => $tampil,
            'cobacrud' => $cobacrud,
            'total' => $total,
            'status' => $request->input('status')
        );
        return view("penilaianProaktif", $data);
    }


    // fungsi update dari inputan user
    public function update(Request $request)
    {
        // dd($request->all());
        $semua = $request->all();
        // $semua = $semua["master_id"][]
        // dd($semua);
        // dd($this->kuesioner_id[48]);
        // $cobacrud = DB::select('CALL penilaianproaktif_tampil_id(?,?)', [ $request->input('master_id'), $request->input('status')]);
        $total = DB::select('call total(?)', [$request->input('status')]);
        // dd($total);
        $count = $total[0]->total;
        $mulai = $total[0]->id;
        $hasil = $mulai + $count;
        // dd($request->input('master_id')[$total[0]->id]);
        for ($mulai; $mulai < $hasil; $mulai++) {
            $update  = array(

                $request->input('kuesioner_id')[$mulai],
                $request->input('jawaban')[$mulai],
                $request->input('rating')[$mulai],
                $request->input('master_id')[$mulai],
            );

            //  dd($update);
            DB::select('CALL penilaianproaktif_update(?,?,?,?)', $update);
            // dd($data);
            // dd($request->input('jawaban'));
        }
        // dd(intval( $request->input('master_id')[$total[0]->id]));
        DB::select('call update_total(?)', [intval($request->input('master_id')[$total[0]->id])]);

        return redirect()->route('id_periode');
    }








    /*==============================================================================================================================*/
}
