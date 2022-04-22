<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersAnggotaController extends Controller
{
    public function data_verifikasi_akun_page()
    {
        return view('admin_view/users_anggota/data_verifikasi_akun');
    }
    
    public function pengaturan_akun_page()
    {
        return view('admin_view/users_anggota/pengaturan_akun');
    }
}
