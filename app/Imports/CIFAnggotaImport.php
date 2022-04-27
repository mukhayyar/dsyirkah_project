<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Anggota;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class CIFAnggotaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
            $user = new User;
            $user->name = $row[1];
            $user->email = $row[3];
            $user->password = Hash::make('password12345');
            $user->role = 'User';
            $user->status = 1;
            $user->save();
            return Anggota::where('nomor_ba','=',$row[0])->update([
                'user_id' => $user->id,
                'no_ktp' => $row[4]
            ]);
    }
}
