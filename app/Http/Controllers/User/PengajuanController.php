<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\PengajuanRupiah;
use App\Models\PerpanjanganRupiah;
use App\Http\Controllers\Controller;

class PengajuanController extends Controller
{
    public function rupiah_store(Request $request)
    {
        $pengajuan = new PengajuanRupiah;
        // bukti tf
        if($request->file('buktiTransfer')){
            $name = $request->file('buktiTransfer')->getClientOriginalName();
            $path = $request->file('buktiTransfer')->move(public_path().'/images/data_penting/bukti_transfer/',$name);
            $pengajuan->bukti_transfer = $name;
        }
        // ttd
        $folderPath = public_path('images\data_penting\tanda_tangan\\');
        $image_parts = explode(";base64,",$request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $filename = uniqid() . '.'.$image_type;
        $file = $folderPath . $filename;
        file_put_contents($file, $image_base64);
        $pengajuan->ttd = $filename;
        //jangka watu
        $jangka_waktu = explode(",",$request->jangka_waktu);
        $jangka_waktu = $jangka_waktu[1];
        // data lain
        $pengajuan->slug = rand().$request->jenis.rand().$request->pilihanProgram;
        $pengajuan->anggota_id = $request->anggota_id;
        $pengajuan->status = "Pengajuan";
        $pengajuan->no_pengajuan = $request->no_referensi;
        $pengajuan->referensi = $request->perwada;
        $pengajuan->pilihan_program = $request->pilihanProgram;
        $pengajuan->jangka_waktu = $jangka_waktu;
        $pengajuan->jenis_syirkah = $request->jenis;
        $pengajuan->versi_syirkah = $request->versi;
        $pengajuan->nisbah = $request->nisbah;
        $pengajuan->perpanjangan = $request->perpanjangan;
        $pengajuan->nominal = $request->nominal;
        $pengajuan->alokasi_nisbah = $request->alokasiNisbah;
        $pengajuan->catatan_pengajuan = $request->catatan;
        $pengajuan->save();
        return redirect()->back()->with('success','Pengajuan sudah terkirim, untuk konfirmasi tolong hubungi admin');
    }
}
