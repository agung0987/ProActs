<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ctrl_user extends Controller
{   
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function user_tampil()
    {
        // $cobacrud = DB::select('CALL indexpenilaianproaktif(?,?)', array(1, 6));
        $datauser = DB::select('CALL user_tampil()');
        // dd($datauser);
        $data=array(
            'datauser'=>$datauser,
        );

        return view('user-tampil', $data);
    }

    public function user_edit(Request $request)
    {
        // dd($request->all());
        User::where('id', $request->id)->update([
            // 'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'hakAkses' => $request->hakAkses,
            'id_pegawai' => $request->id_pegawai,
            
        ]);
        return redirect()->route('tb-user')->with('sukses', 'Data User Berhasil Diubah');
    }

    public function delete($id)
    {

        $data = User::where('id', $id)->first();
        $data->delete();
        return redirect()->route('tb-user')->with('sukses', 'Data User Berhasil Dihapus');
    }
}
