<?php

namespace App\Http\Controllers;

use App\Models\mdl_pegawai;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ctrl_tb_pegawai extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $dtpg=mdl_pegawai::all();
        $data=DB::select('CALL pegawai_tampil()');
        $datajab=DB::select('CALL jabatan_tampil()');
        $dataupt=DB::select('CALL upt_tampil2()');
        $datawil=DB::select('CALL wilayah_tampil()');
        $dataatasan=DB::select('CALL atasan_tampil()');
        // dd($dtpg);
        $dtpegawai=array(
            'dtpg'=>$dtpg,
            'data'=>$data,
            'datajab'=>$datajab,
            'dataupt'=>$dataupt,
            'datawil'=> $datawil,
            'dataatasan'=> $dataatasan
        );
        return view("pegawai-tampil",$dtpegawai);
    }

    public function get_tambah()
    {
        $data=DB::select('CALL pegawai_tampil()');
        $datajab=DB::select('CALL jabatan_tampil()');
        $dataupt=DB::select('CALL upt_tampil2()');
        $datawil=DB::select('CALL wilayah_tampil()');
        $dataatasan=DB::select('CALL atasan_tampil()');
        return view("pegawai-tambah",[
            'data'=>$data,
            'datajab'=>$datajab,
            'dataupt'=>$dataupt,
            'datawil'=> $datawil,
            'dataatasan'=> $dataatasan
        ]);
    }

    public function addIndex()
    {

        return view("pegawai-tambah");
    }


    public function store(Request $request)
    {
        mdl_pegawai::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'TTL' => $request->TTL,
            'pendidikan' => $request->pendidikan,
            'gender' => $request->gender,
            'id_jabatan' => $request->id_jabatan,
            'id_upt' => $request->id_upt,
            'id_wilayah' => $request->id_wilayah,
            'no_telp' => $request->no_telp,
            'id_atasan' => $request->id_atasan

        ]);
        /* Hash::make('$catatan');
        password_hash('$catatan', PASSWORD_DEFAULT);*/
        return redirect()->route("dtpg")->with('sukses', 'Data Pegawai Berhasil Ditambah');
    }


    public function edit(request $request)
    {

        // $indikator= $request->input('nip');
        // dd($indikator);
        mdl_pegawai::where('id', $request->id)->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'TTL' => $request->TTL,
            'pendidikan' => $request->pendidikan,
            'gender' => $request->gender,
            'id_jabatan' => $request->id_jabatan,
            'id_upt' => $request->id_upt,
            'id_wilayah' => $request->id_wilayah,
            'no_telp' => $request->no_telp,
            'id_atasan' => $request->id_atasan,
        ]);
        // dd($data);
        return redirect()->route('dtpg')->with('sukses', 'Data Pegawai Berhasil Diubah');
    }

    public function delete($id)
    {
        // dd($id);
        $data = mdl_pegawai::where('id', $id)->first();
        $data->delete();
        return redirect()->route('dtpg')->with('sukses', 'Data Pegawai Berhasil Dihapus');
    }
}
