<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\formMhsModel;
class form_Mhs_Controller extends Controller
{
    public function index()
    {
        return view('formmhs');
    }

    public function store (Request $request)
    {
        $this->validate($request, [
			
            'nama'=>'required',
            'alamat'=>'required',
            'Kelamin'=>'required',
            'tgl_lahir'=>'required',
            'hoby'=>'required',
            'Email'=>'required',
            'ipk'=>'required',
            'fakultas'=>'required',
            'prodi'=>'required',
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
         
		]);
        $file = $request->file('file');

		$nama_file = time()."_".$file->getClientOriginalName();

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);

        formMhsModel::create([
        'nim'=>$request->nim,
        'nama'=>$request->nama,
        'alamat'=>$request->alamat,
        'Kelamin'=>$request->Kelamin,
        'tgl_lahir'=>$request->tgl_lahir,
        'hoby' => implode(',', (array) $request->get('hoby')),
        'Email'=>$request->Email,
        'ipk'=>$request->ipk,
        'fakultas'=>$request->fakultas,
        'prodi'=>$request->prodi,
        'file' => $nama_file,
        ]);
       

        return redirect()->route('awal');
    }

	// public function proses_upload(Request $request){
	// 	$this->validate($request, [
	// 		'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
	// 	]);

	// 	// menyimpan data file yang diupload ke variabel $file
	// 	$file = $request->file('file');

	// 	$nama_file = time()."_".$file->getClientOriginalName();

    //   	        // isi dengan nama folder tempat kemana file diupload
	// 	$tujuan_upload = 'data_file';
	// 	$file->move($tujuan_upload,$nama_file);

	// 	gambar::create([
	// 		'foto' => $nama_file,
	// 	]);

	// 	return redirect()->route('awal');
	// }
}

