<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // All Akses
        DB::insert('insert into roles (name) values (?)', ['Administrator']);
        // Full Akses ke Aktif, Reakad Nonaktif, pengaturan akun anggota, (pengajuan no edit)
        DB::insert('insert into roles (name) values (?)', ['Teller OPR']);
        // View+export pengajuan, Aktif, Reakad, Nonaktif, pengaturan akun anggota, edit pengajuan
        DB::insert('insert into roles (name) values (?)', ['Admin']);
        // full Akses master, Daftar Usaha & Users Anggota
        DB::insert('insert into roles (name) values (?)', ['Admin IT']);
        // View+export pengajuan, Aktif, Reakad Nonaktif, Daftar Usaha
        DB::insert('insert into roles (name) values (?)', ['Manager']);
        // View pengajuan, Aktif
        DB::insert('insert into roles (name) values (?)', ['Admin Perwada']);
        // Masuk ke halaman user
        DB::insert('insert into roles (name) values (?)', ['User']);
    }
}
