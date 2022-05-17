<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DsyirkahNonAktifController extends Controller
{
    public function emas_index(){
        return view('admin_view/dsyirkah_nonaktif/emas/index');
    }
    public function rupiah_index(){
        return view('admin_view/dsyirkah_nonaktif/rupiah/index');
    }
}
