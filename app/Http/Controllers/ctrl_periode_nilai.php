<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\periodeNilai;

class ctrl_periode_nilai extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data = periodeNilai::paginate(10);
        // $cobacrud = DB::raw("SELECT * FROM `cobacrud` WHERE 1");
            // dd($data);
        return view("index_periode_nilai", [
            "data" => $data,
        ]);
    }

    public function addIndex(){
     
        return view("add_tb_pegawai");
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
            'id_atasan' => $request->id_atasan,
            
        ]);
        /* Hash::make('$catatan');
        password_hash('$catatan', PASSWORD_DEFAULT);*/
        return redirect()->route("dtpg");
    }
    
    public function pegawaidetail(){
        $data = mdl_pegawai::get();
        // $cobacrud = DB::raw("SELECT * FROM `cobacrud` WHERE 1");
            
        return view("tb_pegawai_detail", [
            "data" => $data,
        ]);
        
    }

    public function edit(request $request)
    {


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

        return redirect()->route('dtpg');
    }

    public function delete($id)
    {
// dd($id);
        $data = mdl_pegawai::where('id', $id)->first();
        $data->delete();
        return redirect()->route('dtpg');
    }
}
