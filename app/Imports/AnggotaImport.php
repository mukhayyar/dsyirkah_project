<?php

namespace App\Imports;

use App\Models\Anggota;
use Maatwebsite\Excel\Concerns\ToModel;

class AnggotaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Anggota([
            'nomor_ba'=>$row[0],
            'nama_lengkap'=>$row[1],
            'no_hp'=>$row[2],
            'email'=>$row[3],
        ]);
    }
}
