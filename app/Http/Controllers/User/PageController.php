<?php

namespace App\Http\Controllers\User;

use DataTables;
use App\Models\Usaha;
use App\Models\Anggota;
use App\Models\Perwada;
use App\Models\ItemEmas;
use App\Models\VersiProduk;
use Illuminate\Http\Request;
use App\Models\PengajuanEmas;
use App\Models\PengajuanRupiah;
use App\Models\NisbahVersiProduk;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function cari_bulan($id)
    {
        $id_versi = VersiProduk::find($id);
        $nisbah = NisbahVersiProduk::where('versi_id',$id_versi->id)->get();
        return $nisbah;
    }
    public function cari_nisbah($id)
    {
        $nisbah = NisbahVersiProduk::find($id);
        return $nisbah;
    }

    public function muqayyadah()
    {
        $usaha = Usaha::where('jenis_akad','muqayyadah')->latest()->paginate(3);
        return view('main_view/muqayyadah',compact('usaha')); 
    }
    
    public function mutlaqah(Request $request)
    {
        $usaha = Usaha::where('jenis_akad','mutlaqah')->latest()->paginate(3);
        return view('main_view/mutlaqah',compact('usaha'));
    }
    public function form_pengajuan_emas_mt(Request $request)
    {
        $perwada = Perwada::where('status','Aktif')->get();
        $check_no = PengajuanEmas::where('jenis_syirkah','Mutlaqah')->latest()->first();
        $pengajuan_emas = new PengajuanEmas;
        $item_emas = ItemEmas::where('status',1)->get();
        $generate_no = $pengajuan_emas->generate_no_mt($check_no);
        $user = Anggota::where('user_id',Auth::user()->id)->first(['id','nomor_ba','nama_lengkap','no_hp','email']);
        $versi = VersiProduk::where([
            ['status','=',1],
            ['jenis','=','Mutlaqah'],
            ['item','=','emas'],
        ])->first(['id','versi']);
        if($versi){
            return view('user_view/form_pengajuan_emas',compact('generate_no','versi','user','perwada','item_emas'));
        } else {
            return redirect()->back()->with('warning','Admin belum mengatur versi form');
        }
    }
    public function form_pengajuan_rupiah_mt(Request $request)
    {
        $perwada = Perwada::where('status','Aktif')->get();
        $check_no = PengajuanRupiah::where('jenis_syirkah','Mutlaqah')->latest()->first();
        $pengajuan_rupiah = new PengajuanRupiah;
        $generate_no = $pengajuan_rupiah->generate_no_mt($check_no);
        $user = Anggota::where('user_id',Auth::user()->id)->first(['id','nomor_ba','nama_lengkap','no_hp','email']);
        $versi = VersiProduk::where([
            ['status','=',1],
            ['jenis','=','Mutlaqah'],
            ['item','=','rupiah'],
        ])->first(['id','versi']);
        if($versi){
            return view('user_view/form_pengajuan_rupiah',compact('generate_no','versi','user','perwada'));
        } else {
            return redirect()->back()->with('warning','Admin belum mengatur versi form');
        }
    }
    public function detail_usaha_mutlaqah($id)
    {
        $usaha = Usaha::find($id);
        return view('main_view/detail_mutlaqah',compact('usaha'));
    }
    public function detail_usaha_muqayyadah($id)
    {
        $usaha = Usaha::find($id);
        return view('main_view/detail_muqayyadah',compact('usaha'));
    }
}
