<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Imports\Import;
use App\Imports\Import_User;
use App\Imports\Import_kuesioner;
use App\Imports\Import_Kategori;
use App\Imports\Import_Upt;
use App\Imports\Import_Wilayah;
use App\Imports\Import_Jabatan;
use App\Imports\Import_Pegawai;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ImportController extends Controller
{
    public function Get_Import(){
        return view('import');
    }

    public function pegawaiimport(Request $request){    
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
        // dd($request->all());
        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
        $file -> move('file_import',$nama_file);
        Excel::import(new Import_Pegawai, public_path('/file_import/'.$nama_file));
        Session::flash('sukses','Data Berhasil Diimport!');

        return redirect('/import');
    }

    public function JabatanImport(Request $request){    
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
        // dd($request->all());
        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
        $file -> move('file_import',$nama_file);
        Excel::import(new Import_Jabatan, public_path('/file_import/'.$nama_file));
        Session::flash('sukses','Data Berhasil Diimport!');

        return redirect('/import');
    }

    public function WilayahImport(Request $request){    
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
        // dd($request->all());
        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();     // ERROR
        // dd($nama_file);
        $file -> move('file_import',$nama_file);
        Excel::import(new Import_Wilayah, public_path('/file_import/'.$nama_file));
        Session::flash('sukses','Data Berhasil Diimport!');

        return redirect('/import');
    }

    public function UptImport(Request $request){    
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
        // dd($request->all());
        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
        // dd($nama_file);
        $file -> move('file_import',$nama_file);
        Excel::import(new Import_Upt, public_path('/file_import/'.$nama_file));
        Session::flash('sukses','Data Berhasil Diimport!');

        return redirect('/import');
    }

    public function KategoriImport(Request $request){    
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
        // dd($request->all());
        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
        // dd($nama_file);
        $file -> move('file_import',$nama_file);
        Excel::import(new Import_Kategori, public_path('/file_import/'.$nama_file));
        Session::flash('sukses','Data Berhasil Diimport!');

        return redirect('/import');
    }

    public function KuesionerImport(Request $request){    
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
        // dd($request->all());
        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
        // dd($nama_file);
        $file -> move('file_import',$nama_file);
        Excel::import(new Import_kuesioner, public_path('/file_import/'.$nama_file));
        Session::flash('sukses','Data Berhasil Diimport!');

        return redirect('/import');
    }

        public function periodeimport(Request $request){
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
        // dd($nama_file);
        $file -> move('file_import',$nama_file);
        Excel::import(new Import, public_path('/file_import/'.$nama_file));
        return redirect('/import');
    }

    public function userimport(Request $request){
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
        // dd($nama_file);
        $file -> move('file_import',$nama_file);
        Excel::import(new Import_User, public_path('/file_import/'.$nama_file));
        return redirect('/import');
    }
    
}
