<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DaftarUsahaController extends Controller
{
    public function usaha_basis_emas_page(){
        return view('admin_view/daftar_usaha/usaha_basis_emas/index');
    }
    public function usaha_basis_rupiah_page(){
        return view('admin_view/daftar_usaha/usaha_basis_rupiah/index');
    }
    public function create_usaha_basis_emas_page(){
        return view('admin_view/daftar_usaha/usaha_basis_emas/create');
    }
    public function create_usaha_basis_rupiah_page(){
        return view('admin_view/daftar_usaha/usaha_basis_rupiah/create');
    }
    public function laporan_page(){
        return view('admin_view/daftar_usaha/laporan/index');
    }
}
