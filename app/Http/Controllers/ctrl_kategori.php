<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\model_kategori;


class ctrl_kategori extends Controller
{

    public function autocomplete(Request $request)
    {

        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::select('call kategori_search(?)', [$search]);
        }
        return response()->json($data);
    }


    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function cobacrud(Request $request)
    {
        $cari = array($request->nama);
        if (empty($request->nama)) {
            $data = DB::select('CALL kategori_search(?)', ['kosong']);
        } else {
            $data = DB::select('CALL kategori_search(?)', $cari);
        };

        return view("kategori-tampil", [
            "data" => $data
        ]);
    }

    public function VStore(Request $request)
    {
        return view('VStore');
    }
    public function store(Request $request)
    {
        model_kategori::create([
            'kategori' => $request->kategori,
            //'catatan'=> Hash::make($request->catatan),
        ]);
        /* Hash::make('$catatan');
        password_hash('$catatan', PASSWORD_DEFAULT);*/
        return redirect()->route("in")->with('sukses', 'Data Kategori Berhasil Ditambah');
    }

    public function edit(request $request)
    {
        model_kategori::where('id', $request->id)->update([
            'kategori' => $request->kategori,
        ]);
        return redirect()->route('in')->with('sukses', 'Data Kategori Berhasil Diubah');
    }
    public function delete($id)
    {

        $data = model_kategori::where('id', $id)->first();
        // dd($data);
        $data->delete();
        return redirect()->route('in')->with('sukses', 'Data Kategori Berhasil Dihapus');
    }
}
