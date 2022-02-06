<?php

namespace App\Imports;

use App\Models\mdl_pegawai;
use Maatwebsite\Excel\Concerns\ToModel;

class Import_Pegawai implements ToModel
{
    /**
    * @param array $row
    *qwa
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new mdl_pegawai([
        'nip'=> $row[1],
        'nama'=> $row[2],
        'TTL'=> $row[3],
        'pendidikan' => $row[4],
        'gender'=> $row[5],
        'id_jabatan' => $row[6],
        'id_upt' => $row[7],
        'id_wilayah' => $row[8],
        'no_telp' => $row[9],
        'id_atasan' => $row[10]
        ]);
    }
}
