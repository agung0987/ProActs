<?php

namespace App\Http\Controllers;

use App\Models\model_jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ctrl_jabatan extends Controller
{
    public function autocomplete(Request $request)
    {

        if($request->has('q')){
            $search =array( $request->q, ($request->limit == null? 0 : (($request->limit-1)*10)) );
            $data = DB::select('call jabatan_search(?,?)',$search);
        }
        return response()->json($data);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
        $cari = array($request->nama, (($request->limit-1)*10));
        if(empty($request->nama)){
            $data=DB::select('CALL jabatan_search(?, ?)',['kosong', 0]);
        }else{
            $data=DB::select('CALL jabatan_search(?, ?)', $cari);
        };
        $wilayah = DB::select('CALL wilayah_tampil()');
        // dd($data);
        $datas =  intval(empty($data) ? 0 : $data[0]->jmlbaris);
        // dd($datas);

        $bagi= $datas / 10;
        // dd($bagi);
        $bagi = intval($bagi);

        if(($datas % 10) > 0){
            $bagi = $bagi+1;
        }else{
            
            $bagi = $bagi;
        }
        // dd($bagi);
        $limit =intval($request -> limit);

        $dtjb = array(
            'data' => $data,
            'limit'=> $limit,
            'datas'=> $bagi, 
        );


        return view("jabatan-tampil",$dtjb);
    }
    public function store(request $request){
        model_jabatan::create([
            'nama' =>$request->nama,
        ]);
        // $cobacrud = DB::raw("SELECT * FROM `cobacrud` WHERE 1");
            // dd($data);
        return redirect()->route('dtjb')->with('sukses', 'Data Jabatan Berhasil Ditambah');
    }
public function edit(request $request){
    model_jabatan::where('id', $request->id)->update([
        'nama'=>$request->nama
    ]);
    return redirect()->route('dtjb')->with('sukses', 'Data Jabatan Berhasil Diubah');
}
    public function delete($id)
    {

        $data = model_jabatan::where('id', $id)->first();
        $data->delete();
        return redirect()->route('dtjb')->with('sukses', 'Data Jabatan Berhasil Dihapus');
    }
}
