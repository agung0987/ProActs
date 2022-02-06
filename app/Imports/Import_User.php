<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class Import_User implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name' => $row[1],
            'email'=> $row[2],
            'hakAkses'=> $row[3],
            'id_pegawai'=> $row[4],
            'password' => $row[6]
        ]);
    }
}
