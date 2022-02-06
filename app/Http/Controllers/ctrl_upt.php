<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\upt;
use Illuminate\Support\Facades\DB;

class ctrl_upt extends Controller
{
    public function index(){
        $data=DB::select('CALL upt_tampil()');
        $datas = DB::select('CALL wilayah_tampil()');
        $dtupt=array(
            'data'=>$data,
            'datas'=>$datas
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
		$up =upt::where('kode','like',"%".$cari."%")->paginate();
 
    		// mengirim data pegawai ke view index
		return view('upt',['data' => $up]);
 
	}

    // public function tambah(Request $request)
	// {
	// 	upt::create($request ->all());
    //     return redirect('/upt') ->with ('sukses','Catatan berhasil diinput');
	// }
    public function store (Request $request)
    {
        upt::create([
        'kode'=>$request-> kode,
        'nama'=>$request-> nama,
        'alamat'=>$request-> alamat,
        'email'=>$request-> email,
        'no_telp'=>$request-> no_telp,
        'id_wilayah'=>$request->id_wilayah,
        ]);

        return redirect('tb-upt') -> with ('sukses','Data UPT Berhasil Ditambah');
    }
//     public function edit($id)
//    {
//     $editupt = upt::find($id);
//     return view('edit', ['dataupt' =>$editupt]);
//    }
    public function get_tambah()
    {
        $datas = DB::select('CALL wilayah_tampil()');
        return view("upt-tambah",['datas'=>$datas]);
    }
   public function update ( Request $request,$id)
   {
    $editupt = upt::find($id);
    $editupt -> update($request -> all());
    return redirect('tb-upt')->with ('sukses','Data UPT Berhasil Diubah');

   }
   public function delete ( $id )
   {
    $editupt = upt::find($id);
    $editupt -> delete ($editupt);
    return redirect('tb-upt')->with ('sukses','Data UPT Berhasil Dihapus');
   }
}
