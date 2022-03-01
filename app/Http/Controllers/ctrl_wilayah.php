<?php

namespace App\Http\Controllers;

use App\Models\model_wilayah;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Exports\ExportWilayah;
use App\Imports\Import;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ctrl_wilayah extends Controller
{
    public function autocomplete(Request $request)
    {

        if($request->has('q')){
            $search =array( $request->q, ($request->limit == null? 0 : (($request->limit-1)*10)) );
            $data = DB::select('call wilayah_pagin(?,?)',$search);
        }
        return response()->json($data);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function wilayah_tampil(Request $request)
    {
        // dd($request->all());

        $cari = array($request->nama, ($request->limit - 1) * 10);
        // dd($paginate);
        if (empty($request->all())) {
            $data = DB::select('CALL wilayah_pagin(?,?)', ["kosong", 0]);
            // $datauser = DB::select('CALL user_pagin()');
        } else {
            $data = DB::select('CALL wilayah_pagin(?,?)', $cari);
        }
        $datas =  intval(empty($data) ? 0 : $data[0]->jmlbaris);
        // dd($datas);

        $bagi = $datas / 10;
        // dd($bagi);
        $bagi = intval($bagi);

        if (($datas % 10) > 0) {
            $bagi = $bagi + 1;
        } else {

            $bagi = $bagi;
        }
        // dd($bagi);
        $limit = intval($request->limit);

        $dtwilayah = array(
            'data' => $data,
            'limit' => $limit,
            'datas' => $bagi
        );
        // dd($dtwilayah);
        return view('wilayah_tampil', $dtwilayah);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        model_wilayah::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            //'catatan'=> Hash::make($request->catatan),
        ]);


        return redirect()->route('dtwl')->with('sukses', 'Data Wilayah Berhasil Ditambah');
    }

    public function edit(request $request)
    {
        model_wilayah::where('id', $request->id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_telp' => $request->no_telp
        ]);
        return redirect()->route('dtwl')->with('sukses', 'Data Wilayah Berhasil Diubah');
    }
    public function delete($id)
    {

        $data = model_wilayah::where('id', $id)->first();
        $data->delete();
        return redirect()->route('dtwl')->with('sukses', 'Data wilayah Berhasil Dihapus');
    }

    public function wilayahexport()
    {
        return Excel::download(new ExportWilayah, 'Wilayah.xlsx');
    }
}
