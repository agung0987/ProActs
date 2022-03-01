<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\MstrKategori;
use App\Models\model_kuesioner;
use App\Models\model_kategori;

class ctrl_kuesioner extends Controller
{

    public function autocomplete(Request $request)
    {

        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::select('call kuesioner_search1(?)', [$search]);
        }
        return response()->json($data);
    }


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cobacrud(Request $request)
    {
        $cari = array($request->nama, (($request->limit-1)*10));
        if (empty($request->nama)) {
            $data = DB::select('CALL kuesioner_search(?,?)', ['kosong',0]);
        } else {
            $data = DB::select('CALL kuesioner_search(?,?)', $cari);
        };
        // dd($data);
        $datas =  intval(empty($data) ? 0 : $data[0]->jmlbaris);
        // dd($datas);
        $bagi= $datas / 10;
        // dd($bagi);
        $bagi = intval($bagi);
        // dd($bagi);
        if(($datas % 10) > 0){
            $bagi = $bagi+1;
        }else{    
            $bagi = $bagi;
        }
        // dd($bagi);
        $limit =intval($request -> limit);
        // $cobacrud = DB::raw("SELECT * FROM `cobacrud` WHERE 1");
        return view("kuesioner-tampil", [
            "Data" => $data,
            'limit'=> $limit,
            'datas'=> $bagi,
        ]);
    }
    /*   public function create(){
        $kategori = MstrKategori::all();
        $kuesioner = model_kuesioner::all();
        return redirect()->compact('kategori', 'kuesioner');
    }*/
    public function VStore(Request $request)
    {
        $kategori = DB::table('kategori')->get();
        // dd($kategori);
        return view('kuesioner_VStore', ['data' => $kategori]);
    }
    public function store(Request $request)
    {

        model_kuesioner::create([
            'kategori_id' => $request->kategori_id,
            'indikator' => $request->indikator,
            'bobot' => $request->bobot,
            'status' => $request->status
        ]);

        // $kuesioner = new model_kuesioner();
        // $kuesioner->indikator = $request->indikator;
        // $kuesioner->kategori_id = $request->kategori_id;
        // $kuesioner->bobot = $request->bobot;
        // $kuesioner->save();
        return redirect()->route('kuesioner')->with('sukses', 'Data Kuesioner Berhasil Ditambah');
    }

    public function edit(request $request, $id)
    {

        model_kuesioner::where('id', $request->id)->update([
            'indikator' => $request->indikator,
            'kategori_id' => $request->kategori_id,
            'bobot' => $request->bobot,
        ]);

        return redirect()->route('kuesioner')->with('sukses', 'Data Kuesioner Berhasil Diubah');
    }

    public function delete($id)
    {

        $data = model_kuesioner::where('id', $id)->first();
        $data->delete();
        return redirect()->route('kuesioner')->with('sukses', 'Data Kuesioner Berhasil Dihapus');
    }
}
