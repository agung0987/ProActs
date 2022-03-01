<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\upt;
use Illuminate\Support\Facades\DB;

class ctrl_upt extends Controller
{
    public function autocomplete(Request $request)
    {

        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::select('call upt_autocomplete(?)', [$search]);
        }
        return response()->json($data);
    }

    public function index(Request $request)
    {
        $cari = array($request->nama, (($request->limit - 1) * 10));

        if (empty($request->nama)) {
            $data = DB::select('CALL upt_pagin(?, ?)', ['kosong', 0]);
        } else {
            $data = DB::select('CALL upt_pagin(?, ?)', $cari);
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

        $dtupt = array(
            'data' => $data,
            'limit'=> $limit,
            'datas'=> $bagi, 
            'wilayah_drop'=> $wilayah
        );
        
        // $up = upt::paginate(6);
        // return view('upt-tampil', [
        //     'data'=>$up,
        //     ]);

        // dd($dtupt);
        return view('upt-tampil', $dtupt);
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $up = upt::where('kode', 'like', "%" . $cari . "%")->paginate();

        // mengirim data pegawai ke view index
        return view('upt', ['data' => $up]);
    }

    // public function tambah(Request $request)
    // {
    // 	upt::create($request ->all());
    //     return redirect('/upt') ->with ('sukses','Catatan berhasil diinput');
    // }
    public function store(Request $request)
    {
        upt::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'id_wilayah' => $request->id_wilayah,
        ]);

        return redirect('tb-upt')->with('sukses', 'Data UPT Berhasil Ditambah');
    }
    //     public function edit($id)
    //    {
    //     $editupt = upt::find($id);
    //     return view('edit', ['dataupt' =>$editupt]);
    //    }
    public function get_tambah()
    {
        $datas = DB::select('CALL wilayah_tampil()');
        return view("upt-tambah", ['datas' => $datas]);
    }
    public function update(Request $request, $id)
    {
        $editupt = upt::find($id);
        $editupt->update($request->all());
        return redirect('tb-upt')->with('sukses', 'Data UPT Berhasil Diubah');
    }
    public function delete($id)
    {
        $editupt = upt::find($id);
        $editupt->delete($editupt);
        return redirect('tb-upt')->with('sukses', 'Data UPT Berhasil Dihapus');
    }
}
