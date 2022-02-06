<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\Export_User;  
use App\Exports\Export_Lap_Per_Pegawai;  
use App\Exports\Export_Kuesioner;  
use App\Exports\Export_Kategori;  
use App\Exports\Export_Upt;  
use App\Exports\Export_Jabatan;  
use App\Exports\Export_Pegawai;  
use App\Exports\Export;  
use App\Exports\ExportWilayah;  
use App\Imports\Import; 
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use ZipArchive;
use File;

class ExsportController extends Controller
{
    public function Index(){
        return view('export');
    }

    public function export(Request $request)
    {
        // dd($request->weekdays);
        // $this->validate($request, [
        //     'data' => 'required'
        // ]);
        // dd($request->data);
        $this->zipFile($request->data);
        return response()->download(public_path('zip/kemenkumham.zip'))->deleteFileAfterSend(true);
        // $this->zipFile($request->weekdays);
    }

    public function zipFile($tipes)
    {
        $zip_file = public_path('zip/kemenkumham.zip');
        $zip = new ZipArchive;
        $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

        if (count($tipes) > 0) {
            foreach($tipes as $tipe) {
                if ($tipe == 'Tabel_Pegawai') {
                    Excel::store(new Export_Pegawai(), 'file_export/Tabel_Pegawai.xlsx','real_public');
                    $filePath = public_path('file_export/Tabel_Pegawai.xlsx');
                    $zip->addFile($filePath, 'zip/Tabel_Pegawai.xlsx');
                }

                if ($tipe == 'Tabel_Jabatan') {
                    Excel::store(new Export_Jabatan(), 'file_export/Tabel_Jabatan.xlsx','real_public');
                    $filePath = public_path('file_export/Tabel_Jabatan.xlsx');
                    $zip->addFile($filePath, 'zip/Tabel_Jabatan.xlsx');
                }

                if ($tipe == 'Tabel_Wilayah') {
                    Excel::store(new ExportWilayah(), 'file_export/Tabel_Wilayah.xlsx','real_public');
                    $filePath = public_path('file_export/Tabel_Wilayah.xlsx');
                    $zip->addFile($filePath, 'zip/Tabel_Wilayah.xlsx');
                }

                if ($tipe == 'Tabel_UPT') {
                    Excel::store(new Export_Upt(), 'file_export/Tabel_Upt.xlsx','real_public');
                    $filePath = public_path('file_export/Tabel_Upt.xlsx');
                    $zip->addFile($filePath, 'zip/Tabel_Upt.xlsx');
                }

                if ($tipe == 'Tabel_Kategori') {
                    Excel::store(new Export_Kategori(), 'file_export/Tabel_Kategori.xlsx','real_public');
                    $filePath = public_path('file_export/Tabel_Kategori.xlsx');
                    $zip->addFile($filePath, 'zip/Tabel_Kategori.xlsx');
                }

                if ($tipe == 'Tabel_Kuesioner') {
                    Excel::store(new Export_Kuesioner(), 'file_export/Tabel_Kuesioner.xlsx','real_public');
                    $filePath = public_path('file_export/Tabel_Kuesioner.xlsx');
                    $zip->addFile($filePath, 'zip/Tabel_Kuesioner.xlsx');
                }

                if ($tipe == 'Tabel_Periode_Nilai') {
                    Excel::store(new Export(), 'file_export/Tabel_Periode-penilaian.xlsx','real_public');
                    $filePath = public_path('file_export/Tabel_Periode-penilaian.xlsx');
                    $zip->addFile($filePath, 'zip/Tabel_Periode-penilaian.xlsx');
                }

                if ($tipe == 'Tabel_User') {
                    Excel::store(new Export_User(), 'file_export/Tabel_User.xlsx','real_public');
                    $filePath = public_path('file_export/Tabel_User.xlsx');
                    $zip->addFile($filePath, 'zip/Tabel_User.xlsx');
                }
            }
        }

        $zip->close();
        return $zip_file;
    }

    public function export_excel_lap_per_pegawai()
	{
		return Excel::download(new Export_Lap_Per_Pegawai, 'lap_per-pegawai.xlsx');
	}


}
