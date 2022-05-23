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
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function kelengkapan_data()
    {
        $user_id = Auth::user()->id;
        $anggota = Anggota::where('user_id',$user_id)->first();
        return view('user_view/form_kelengkapan_data_anggota',compact('anggota'));
    }
    public function kelengkapan_data_store(Request $request)
    {
        // dd($request->file('file_ktp'));
        $validation = Validator::make($request->all(), [
            'nomor_ba' => ['required', 'string', 'max:24'],
            'no_ktp' => ['required', 'string','min:16','max:16'],
            'jenis_kelamin' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'status_nikah' => ['required'],
            'alamat_ktp' => ['required'],
            'kelurahan_ktp' => ['required'],
            'kecamatan_ktp' => ['required'],
            'kota_ktp' => ['required'],
            'provinsi_ktp' => ['required'],
            'file_ktp' => ['required','max:2048'],
        ]);
        if($validation->fails()){
            return redirect()->back()->with($validation->errors());
        }
        $anggota = Anggota::where('nomor_ba',$request->nomor_ba)->first();
        if($request->file('file_ktp')){
            $name = $request->file('file_ktp')->getClientOriginalName();
            $path = $request->file('file_ktp')->move(public_path().'/images/data_penting/ktp/',$name);
            $anggota->foto_ktp = $name;
            $anggota->lokasi_foto_ktp = $path;
        }
        $anggota->no_ktp = $request->no_ktp;
        $anggota->jenis_kelamin = $request->jenis_kelamin;
        $anggota->tempat_lahir = $request->tempat_lahir;
        $anggota->tanggal_lahir = $request->tanggal_lahir;
        $anggota->status_nikah = $request->status_nikah;
        $anggota->alamat_ktp = $request->alamat_ktp;
        $anggota->provinsi_ktp = $request->provinsi_ktp;
        $anggota->kelurahan_ktp = $request->kelurahan_ktp;
        $anggota->kecamatan_ktp = $request->kecamatan_ktp;
        $anggota->kota_ktp = $request->kota_ktp;
        $anggota->alamat_tinggal = $request->alamatTinggal;
        $anggota->alamat_domisili = $request->alamat_dom;
        $anggota->provinsi_domisili = $request->provinsi_dom;
        $anggota->kota_domisili = $request->kota_dom;
        $anggota->kecamatan_domisili = $request->kecamatan_dom;
        $anggota->kelurahan_domisili = $request->kelurahan_dom;
        $anggota->save();
        return redirect()->back();
    }
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
        $user_id = Auth::user()->id;
        $check_lengkap_data = Anggota::where('user_id',$user_id)->first('no_ktp');
        $usaha = Usaha::where('jenis_akad','muqayyadah')->latest()->paginate(3);
        return view('main_view/muqayyadah',compact('usaha','check_lengkap_data')); 
    }
    
    public function mutlaqah(Request $request)
    {
        $user_id = Auth::user()->id;
        $check_lengkap_data = Anggota::where('user_id',$user_id)->first('no_ktp');
        $usaha = Usaha::where([
            ['jenis_akad','mutlaqah'],
            ['status_post','Posting'],
        ])->latest()->paginate(3);
        $target_rupiah = DB::table('usaha')->where('jenis_akad','mutlaqah')->sum('kebutuhan_rupiah');
        $bagian_target_rupiah = DB::table('pengajuan_rupiah')->where([
            ['jenis_syirkah','Mutlaqah'],
            ['status','Approved']
        ])->sum('nominal');
        $target_emas = DB::table('usaha')->where('jenis_akad','mutlaqah')->sum('kebutuhan_emas');
        $bagian_target_emas = DB::table('pengajuan_emas')->where([
            ['jenis_syirkah','Mutlaqah'],
            ['status','Approved']
        ])->sum('total_gramasi');
        $percent_target_rupiah = ($bagian_target_rupiah/$target_rupiah)*100;
        $percent_target_emas = ($bagian_target_emas/$target_emas)*100;
        $percent_target_rupiah = round($percent_target_rupiah);
        $percent_target_emas = round($percent_target_emas);
        return view('main_view/mutlaqah',compact('usaha','target_rupiah','target_emas','percent_target_rupiah','percent_target_emas','check_lengkap_data'));
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
