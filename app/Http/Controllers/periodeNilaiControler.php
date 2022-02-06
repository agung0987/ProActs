<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\periode_nilai;

use App\Exports\Export;  
use App\Imports\Import; 
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;


class periodeNilaiControler extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $up = periode_nilai::orderBy('id', 'DESC')->get();
        // dd($up);
        return view('periode-penilaian', [
            'data' => $up,
        ]);
    }

    public function periode2()
    {
        $up = periode_nilai::orderBy('id', 'DESC')->get();
        return view('periode2', [
            'data' => $up,
        ]);
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $up = periode_nilai::where('nama', 'like', "%" . $cari . "%")->paginate();

        // mengirim data pegawai ke view index
        return view('periode', ['data' => $up]);
    }

    public function tambah()
    {
        return view('periode-tambah');
    }
    public function store(Request $request)
    {
        periode_nilai::create([
            'tahun' => $request->tahun,
            'periode' => $request->periode,
            'bulan' => $request->bulan,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_tutup' => $request->tgl_tutup,
            'status' => $request->status,
        ]);

        return redirect('/periode')->with('sukses', 'Data Periode Nilai Berhasil Ditambah');
    }
    public function edit($id)
    {
        $data = periode_nilai::all();
        $editnilai = periode_nilai::find($id);
        return view('editPeriode', [
            'dataupt' => $editnilai,
            'dataa' => $data
        ]);
    }
    public function update(Request $request)
    {
        // dd($request->all());
        // $editnilai = periode_nilai::find($id);
        // $editnilai->update($request->all());
        periode_nilai::where('id', $request->id)->update([
        // periode_nilai::create([
            'id' => $request->id,
            'tahun' => $request->tahun,
            'periode' => $request->periode,
            'bulan' => $request->bulan,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_tutup' => $request->tgl_tutup,
            'status' => $request->status,
        ]);
        return redirect('/periode')->with('sukses', 'Data Periode Nilai Berhasil Diubah');
    }
    public function delete($id)
    {
        $editnilai = periode_nilai::find($id);
        $editnilai->delete($editnilai);
        return redirect('/periode')->with('sukses', 'Data Periode Nilai Berhasil Dihapus');
    }

    public function periodeexport(){
        return Excel::download(New Export,'Periode-penilaian.xlsx');
    }

    public function periodeimport(Request $request){
        $file = $request->file('file');
        $namaFile = $file -> getClientOriginalName();
        $file -> move('');
    }
}
