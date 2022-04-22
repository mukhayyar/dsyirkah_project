<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function perwada_page()
    {
        return view('admin_view/master/perwada');
    }    
    public function cif_anggota_page()
    {
        return view('admin_view/master/cif_anggota');
    }    
    public function konten_wa_page()
    {
        return view('admin_view/master/');
    }    
    public function list_keterangan_page()
    {
        return view('admin_view/master/');
    }    
    public function item_emas_page()
    {
        return view('admin_view/master/item_emas');
    }    
}
