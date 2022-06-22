<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\PengajuanEmas;
use Intervention\Image\Facades\Image;
use App\Models\PengajuanRupiah;
use App\Models\PerpanjanganRupiah;
use App\Http\Controllers\Controller;
use App\Models\RincianPengajuanEmas;

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
        $folderPath = public_path().'/images/data_penting/tanda_tangan/';
        $image_parts = explode(";base64,",$request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $filename = uniqid() . '.'.$image_type;
        $file = $folderPath . $filename;
        file_put_contents($file,$image_base64);
        $pengajuan->ttd = $filename;
        //jangka watu
        if($request->jangka_waktu){
            $jangka_waktu = explode(",",$request->jangka_waktu);
            $jangka_waktu = $jangka_waktu[1];
        } else {
            $jangka_waktu=12;
        }
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
        $pengajuan->kode_usaha = $request->kode_usaha;
        $pengajuan->perpanjangan = $request->perpanjangan;
        $pengajuan->nominal = str_replace(".","",$request->nominal);
        $pengajuan->alokasi_nisbah = $request->alokasiNisbah;
        $pengajuan->catatan_pengajuan = $request->catatan;
        $pengajuan->created_at = $request->today;
        $pengajuan->save();
        return redirect('/transaction')->with('success','Pengajuan sudah terkirim, untuk konfirmasi tolong hubungi admin');
    }
    public function emas_store(Request $request)
    {
        // dd($request->all());
        $pengajuan = new PengajuanEmas;
        // ttd
        $folderPath = public_path().'/images/data_penting/tanda_tangan/';
        $image_parts = explode(";base64,",$request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $filename = uniqid() . '.'.$image_type;
        $file = $folderPath . $filename;
        file_put_contents($file,$image_base64);
        $pengajuan->ttd = $filename;
        //jangka watu

        if($request->jangka_waktu){
            $jangka_waktu = explode(",",$request->jangka_waktu);
            $jangka_waktu = $jangka_waktu[1];
        } else {
            $jangka_waktu=12;
        }
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
        $pengajuan->kode_usaha = $request->kode_usaha;
        $pengajuan->perpanjangan = $request->perpanjangan;
        $pengajuan->total_gramasi = $request->total_jumlah_emas;
        $pengajuan->alokasi_nisbah = $request->alokasiNisbah;
        $pengajuan->catatan_pengajuan = $request->catatan;
        $pengajuan->created_at = $request->today;
        $pengajuan->save();
        $length = count($request->item_emas);
        for($i =0; $i <$length;$i++)
        {
            $rincianPengajuanEmas = new RincianPengajuanEmas;
            $rincianPengajuanEmas->pengajuan_id = $pengajuan->id;
            $rincianPengajuanEmas->emas_id = $request->id_emas[$i];            
            $rincianPengajuanEmas->item = $request->item_emas[$i];            
            $rincianPengajuanEmas->jenis = $request->jenis_emas[$i];            
            $rincianPengajuanEmas->gramasi = $request->gramasi_emas[$i];            
            $rincianPengajuanEmas->keping = $request->keping_emas[$i];            
            $rincianPengajuanEmas->jumlah = $request->jumlah_keping[$i];
            $rincianPengajuanEmas->save();            
        }
        return redirect('/transaction')->with('success','Pengajuan sudah terkirim, untuk konfirmasi tolong hubungi admin');
    }

    public function muqayyadah_store(Request $request){
        if($request->jenis_form == 'rupiah'){
            return $this->rupiah_store($request);
        } else {
            return $this->emas_store($request);
        }
    }
}
