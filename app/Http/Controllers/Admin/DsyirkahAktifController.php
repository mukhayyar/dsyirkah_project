<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DsyirkahAktifController extends Controller
{
    public function emas_index(){
        return view('admin_view/dsyirkah_aktif/emas/index');
    }
    public function rupiah_index(){
        return view('admin_view/dsyirkah_aktif/rupiah/index');
    }
}
