<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Anggota;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\ToCollection;

class CIFAnggotaImport implements ToModel, WithValidation, SkipsOnFailure, SkipsEmptyRows
{
    use SkipsFailures;
    public function rules(): array
    {
        return [
            '1' => 'required|string|exists:App\Models\Anggota,nomor_ba', // nomor ba
            '2' => 'required|string', // nama lengkap
            '4' => 'required', // email
            '5' => 'required|numeric', // ktp
        ];
    }
    public function collection(Collection $rows)
    {
        foreach($rows as $row)
        {
            $user = new User;
            $user->name = $row[2];
            $user->email = $row[4];
            $user->password = Hash::make('password12345');
            $user->role = 'User';
            $user->status = 1;
            $user->save();
            Anggota::where('nomor_ba','=',$row[1])->update([
                'user_id' => $user->id,
                'no_ktp' => $row[5],
                'no_npwp' => $row[6],
                'jenis_kelamin' => $row[7],
                'tempat_lahir' => $row[8],
                'tanggal_lahir' => $row[9],
                'status_nikah' => $row[10],
                'alamat_ktp' => $row[11],
                'kelurahan_ktp' => $row[12],
                'kecamatan_ktp' => $row[13],
                'kota_ktp' => $row[14],
                'provinsi_ktp' => $row[15],
                'alamat_tinggal' => $row[16],
                'alamat_domisili' => $row[17],
                'kelurahan_domisili' => $row[18],
                'kecamatan_domisili' => $row[19],
                'kota_domisili' => $row[20],
                'provinsi_domisili' => $row[21],
            ]);
        }
    }
}
