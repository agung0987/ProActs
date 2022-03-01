<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class profileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $data = DB::select('call sp_profil2(?)', [(Auth::user()->id)]);
            

        return view('profile',[
            'datauser' => $data
        ]);
    }

    public function laporan(Request $request){
        $data = DB::select('call sp_home_user(?)', [(Auth::user()->id)]);
            

        return view('laporan_penilaian',[
            'datauser' => $data
        ]);
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
        return redirect()->route('profile')->with('sukses', 'Data User Berhasil Diubah');
    }

    public function delete($id)
    {

        $data = User::where('id', $id)->first();
        $data->delete();
        return redirect()->route('profile')->with('sukses', 'Data User Berhasil Dihapus');
    }
    
}
