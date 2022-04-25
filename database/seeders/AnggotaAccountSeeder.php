<?php

namespace Database\Seeders;

use App\Models\Anggota;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnggotaAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAnggota = User::create([
            'name' => Str::random(10),
            'email' => 'anggota@test.com',
            'password' => Hash::make('password'),
            'role' => 'User'
        ]);
        $userProfile = Anggota::create([
            'user_id' => $userAnggota->id,
            'nomor_ba' => '12313123',
            'nama_lengkap' => $userAnggota->name,
            'no_hp' => '082131231',
            'email' => $userAnggota->email,
            'status' => 1
        ]);
    }
}
