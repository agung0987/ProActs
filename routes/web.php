<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

*/

Route::get('/', function () {
    return view('auth/login');
});


//Route::get('/users', [ctrl_kategori::cobacrud, 'in']);
Route::get('/kategori', 'ctrl_kategori@cobacrud')->name('in');
Route::get('/view/kategori-tambah', 'ctrl_kategori@VStore');
Route::post('/kategori-tambah', 'ctrl_kategori@store')->name('in.tambah');
Route::post('/kategori-edit/{id}', 'ctrl_kategori@edit')->name('in.edit');
Route::get('/kategori-delete/{id}', 'ctrl_kategori@delete')->name('in.delete');

//kuesioner
Route::get('/kuesioner', 'ctrl_kuesioner@cobacrud')->name('kuesioner');
Route::get('/view/kuesionertambah', 'ctrl_kuesioner@VStore');
Route::post('/kuesionertambah', 'ctrl_kuesioner@store')->name('kuesioner.tambah');
Route::post('/kuesioneredit/{id}', 'ctrl_kuesioner@edit')->name('kuesioner.edit');
Route::get('/kuesionerdelete/{id}', 'ctrl_kuesioner@delete')->name('kuesioner.delete');

//periode nilai
// Route::get('/periode', 'wilayahControler@index')->name('awal');
// Route::post('/periode/tambah', 'wilayahControler@tambah')->name('tambah');
// Route::post('/periode/store', 'wilayahControler@store')->name('store');
// Route::get('periode/edit/{id}', 'wilayahControler@edit')->name('edit');
// Route::post('/periode/{id}/update', 'wilayahControler@update')->name('update');
// Route::get('/periode/delete/{id}', 'wilayahControler@delete')->name('delete');
// Route::get('/periode/cari', 'wilayahControler@cari')->name('cari');


//kuesioner
//Route::get('/login', 'App\Http\Controllers\ctrl_kuesioner@cobacrud')->name('kuesioner');
//Route::post('/logintambah', 'App\Http\Controllers\ctrl_kuesioner@store')->name('kuesioner.tambah');


//login
route::get('/login', [LoginController::class, 'halamanlogin'])->name('login');
route::post('/login/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
route::get('/login/postlogin/registrasi', [LoginController::class, 'registrasi'])->name('registrasi');
route::post('/login/postlogin/registrasi/simpanregistrasi', [LoginController::class, 'simpanregistrasi'])->name('simpanregistrasi');

// //penilaian proaktif
// Route::get('/penilaian-proaktif', 'ctrlPenilaian@cobacrud')->name('uplod');
// Route::post('/penilaian-proaktif/proses', 'ctrlPenilaian@store')->name('proses_uplod');
// Route::post('/penilaian-proaktif/editpenilaianproaktif', 'ctrlPenilaian@edit')->name('proses_edit');
// Route::get('/penilaian/cari', 'ctrlPenilaian@search')->name('cari');
Route::get('/penilaian-proaktif/cetak', 'ctrlPenilaian@cetak_pdf');
// Route::get('/penilaian-proaktif/search', 'ctrlPenilaian@search');


// periode2
Route::get('/periodePenilaian-pilih', 'ctrlPenilaian@periode2') -> name ('id_periode');
Route::get('/pegawai-pilih', 'ctrlPenilaian@pegawaiPilih')-> name ('pegawai-pilih');
Route::get('/penilaian', 'ctrlPenilaian@penilaian')-> name ('penilaian');
Route::get('/autocomplete', 'ctrlPenilaian@autocomplete')->name('autocomplete');
Route::get('/penilaian', 'ctrlPenilaian@penilaian')->name('uplod');

Route::post('/penilaian-proaktif2/update', 'ctrlPenilaian@update');


//chart
Route::get('/chart', 'lineChart@line')->name('crud.chart');
Route::post('/chart/tambah', 'ctrlChart@store')->name('chart.tambah');
Route::post('/chart/hapus/{id}', 'ctrlChart@delete')->name('chart.hapus');
//Route::post('/upload/edit/{id}', 'ctrlPenilaianProaktif@edit')->name('proses_edit');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/cobaupload', 'UplodCtrl@upload');
Route::post('/upload/proses', 'UplodCtrl@proses_upload')->name('tambahuplod');


// form mhs
Route::get('/form-mhs', 'form_Mhs_Controller@index')->name('awal');
Route::post('/form-mhs/store', 'form_Mhs_Controller@store')->name('store');



// prrototype

Route::get('/tb-pegawai', 'ctrl_tb_pegawai@index')->name('dtpg');
Route::get('/tb-pegawai/tambahh', 'ctrl_tb_pegawai@get_tambah');
Route::get('/Add-tb-pegawai', 'ctrl_tb_pegawai@addIndex');
Route::post('/Add', 'ctrl_tb_pegawai@store')->name('tmbh_pegawai');
Route::get('/tb-pegawai-detail/{id}', 'ctrl_tb_pegawai@pegawaidetail');
Route::post('/edit', 'ctrl_tb_pegawai@edit')->name('dtpg_edit');
Route::get('/del/{id}', 'ctrl_tb_pegawai@delete')->name('dtpg_del');



// tabel jabtan
Route::get('/tb-jabatan', 'ctrl_jabatan@index')->name('dtjb');
Route::post('/tb-jabatan/tambah', 'ctrl_jabatan@store')->name('dtjb-tambah');
Route::get('/tb-jabatan/delete/{id}', 'ctrl_jabatan@delete')->name('dtjb-delete');
Route::post('/tb-jabatan/edit/{id}', 'ctrl_jabatan@edit')->name('dtjb-edit');




// upt
Route::get('/tb-upt', 'ctrl_upt@index')->name('tb-upt');
Route::get('/tb-upt/tambahh', 'ctrl_upt@get_tambah');
// Route::post('/tb-upt/tambah', 'ctrl_upt@tambah')->name('tb-upt-tambah');
Route::post('/tb-upt/tambah', 'ctrl_upt@store')->name('tb-upt-tambah');
// Route::get('tb-upt/edit/{id}', 'ctrl_upt@edit')->name('edit');
Route::post('/tb-upt/edit/{id}', 'ctrl_upt@update')->name('tb-upt-edit');
Route::get('/tb-upt/delete/{id}', 'ctrl_upt@delete')->name('delete');
Route::get('/tb-upt/cari', 'ctrl_upt@cari')->name('cari');


// user
Route::get('/tb-user', 'ctrl_user@user_tampil')->name('tb-user');
Route::post('/tb-user/edit{id}', 'ctrl_user@user_edit')->name('tb-user-edit');
Route::get('/tb-user/delete/{id}', 'ctrl_user@delete')->name('tb-user-delete');


// periode
// periodeNilaiControler
Route::get('/periode', 'periodeNilaiControler@index') -> name ('periode-awal');
Route::get('/periode/tambah','periodeNilaiControler@tambah') -> name('periode-tambah');
Route::post('/periode/store', 'periodeNilaiControler@store') -> name ('periode-store');
Route::get('periode/edit/{id}','periodeNilaiControler@update')-> name ('periode-edit');
Route::post('/periode/update/{id}', 'periodeNilaiControler@update') -> name ('periode-update');
Route::get('/periode/delete/{id}','periodeNilaiControler@delete') -> name ('periode-delete');
Route::get('/periode/cari','periodeNilaiControler@cari') -> name ('periode-cari');
Route::get('/periode/export','periodeNilaiControler@periodeexport') -> name ('periode-export');

// periode2
Route::get('/periode2', 'periodeNilaiControler@periode2') -> name ('periode-awal');


// wilayah

Route::get('/tb-wilayah', 'ctrl_wilayah@wilayah_tampil')->name('dtwl');
Route::get('/tb-wilayah_gettambah', 'ctrl_wilayah@getTambah')->name('getTambah');
Route::post('/tb-wilayah/tambah', 'ctrl_wilayah@store')->name('dtwl-tambah');
Route::post('/tb-wilayah/edit/{id} ', 'ctrl_wilayah@edit')->name('dtwl-edit');
Route::get('/delete/{id}', 'ctrl_wilayah@delete')->name('dtwl-delete');
Route::get('/tb-wilayah/export','ctrl_wilayah@wilayahexport') -> name ('periode-export');

// Exsport 
Route::get('/export', 'ExsportController@Index')->name('export');
Route::get('/exportfile', 'ExsportController@export')->name('exportfile');


// import
Route::get('/import', 'ImportController@Get_Import')->name('import');
Route::post('/import_pegawai', 'ImportController@pegawaiimport')->name('import_pegawai');
Route::post('/import_jabatan', 'ImportController@JabatanImport')->name('import_jabatan');
Route::post('/import_wilayah', 'ImportController@WilayahImport')->name('import_wilayah');
Route::post('/import_upt', 'ImportController@UptImport')->name('import_upt');
Route::post('/import_kategori', 'ImportController@KategoriImport')->name('import_kategori');
Route::post('/import_kuesioner', 'ImportController@KuesionerImport')->name('import_kuesioner');
Route::post('/import_periode', 'ImportController@periodeimport')->name('import_periode');
Route::post('/import_user', 'ImportController@userimport')->name('import_user');




// proses penilaian
Route::get('/Proses-Akhir-Penilaian', 'ctrl_proses_penilaian@tampil')->name('Proses-Akhir-Penilaian');
Route::get('/Proses', 'ctrl_proses_penilaian@proses');

// lap_per_pegawai
Route::get('/lap_per_pegawai', 'lap_per_pegawai@getlap_master_penilaian')->name('lap_per_pegawai');
Route::get('/pagination/fetch_data', 'lap_per_pegawai@fetch_data');
Route::get('export_lap_per_pegawai', 'ExsportController@export_excel_lap_per_pegawai')->name('lap_per_pegawai');
Route::get('/autocomplete_lap_per_pegawai', 'lap_per_pegawai@autocomplete')->name('autocompleteautocomplete_lap_per_pegawai');
Route::get('/lap_per_pegawai/cetak_pdf', 'lap_per_pegawai@cetak_pdf');



//laporan jml wilayah
Route::get('/lap_jml_wilayah', 'ctrl_jml_wilayah@pilih_wilayah')->name('lap_jml_wilayah');
Route::get('/jml_wilayah', 'ctrl_jml_wilayah@lihat');

//laporan sub wilayah
Route::get('/lap_sub_wilayah', 'ctrl_sub_wilayah@pilih_wilayah')->name('lap_sub_wilayah');
Route::get('/sub_wilayah', 'ctrl_sub_wilayah@lihat');
// Route::get('/pilih_wilayah','ctrl_jml_wilayah@pilih_wilayah')->name('tampil');
// Route::get('/Cari','ctrl_jml_wilayah@cari') -> name ('cari');


//laporan jml upt wilayah
Route::get('/lap_jml_upt_wilayah', 'ctrl_jml_upt_wilayah@pilih_wilayah')->name('lap_jml_upt_wilayah');
Route::get('/jml_upt_wilayah', 'ctrl_jml_upt_wilayah@lihat');


//laporan sub upt wilayah
Route::get('/lap_sub_upt_wilayah', 'ctrl_sub_upt_wilayah@pilih_wilayah')->name('lap_sub_upt_wilayah');
Route::get('/sub_upt_wilayah', 'ctrl_sub_upt_wilayah@lihat');

// Rakening Pegawai Wilayah
Route::get('/Rangking_Pegawai_wilayah', 'Rangking_Pegawai_wilayah@GetRangkingPegawaiWilayah')->name('Rangking_Pegawai_wilayah');

// Rakening Pegawai Upt
Route::get('/Rangking_Pegawai_Upt', 'Rangking_Pegawai_Upt@GetRangkingPegawaiUpt')->name('Rangking_Pegawai_Upt');





