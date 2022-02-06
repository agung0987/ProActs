<?php

namespace App\Http\Controllers;

use App\Models\model_jabatan;
use Illuminate\Http\Request;

class ctrl_jabatan extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data = model_jabatan::paginate(10);
        // $cobacrud = DB::raw("SELECT * FROM `cobacrud` WHERE 1");
            // dd($data);
        return view("jabatan-tampil", [
            "data" => $data,
        ]);
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
