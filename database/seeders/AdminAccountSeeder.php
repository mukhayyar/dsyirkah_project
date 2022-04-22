<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAdministrator = User::create([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'Administrator'
        ]);
        $administratorProfile = Admin::create([
            'user_id' => $userAdministrator->id,
            'nama_karyawan' => $userAdministrator->name,
            'user_name' => 'mentorbaik',
            'email' => $userAdministrator->email,
            'jabatan' => 'Karyawan',
            'kantor' => 'Pusat',
            'status' => 1
        ]);
    }
}
