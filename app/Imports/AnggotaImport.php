<?php

namespace App\Imports;

use App\Models\Anggota;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;

class AnggotaImport implements ToModel, WithValidation, SkipsOnFailure, SkipsEmptyRows
{
    use SkipsFailures;
    public function model(array $row)
    {
        return new Anggota([
            'nomor_ba'=>$row[1],
            'nama_lengkap'=>$row[2],
            'no_hp'=>$row[3],
            'email'=>$row[4],
        ]);
    }

    public function rules(): array
    {
        return [
            '1' => 'required|string|unique:App\Models\Anggota,nomor_ba',
            '2' => 'required|string',
            '3' => 'required|numeric',
            '4' => 'required|email|unique:App\Models\Anggota,email',
        ];
    }
}
