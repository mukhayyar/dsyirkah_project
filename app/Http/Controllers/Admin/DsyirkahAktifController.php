<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Exports\AktifEmasEx;
use App\Models\NonAktifEmas;
use Illuminate\Http\Request;
use App\Models\PengajuanEmas;
use App\Exports\AktifRupiahEx;
use App\Models\NonAktifRupiah;
use App\Models\PengajuanRupiah;
use App\Models\PerpanjanganEmas;
use App\Models\PerpanjanganRupiah;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class DsyirkahAktifController extends Controller
{
    public function emas_index(Request $request){
         if($request->ajax()) {
            if(!empty($request->from_date)) {
                if($request->from_date == $request->to_date){
                    $data = PengajuanEmas::with('perpanjangan_emas','anggota','versi')->where([
                        ['status','=','Approved']
                    ])
                    ->whereDate('created_at',$request->from_date)
                    ->orderBy("tgl_persetujuan","desc")->get();
                } else {
                    $data = PengajuanEmas::with('perpanjangan_emas','anggota','versi')->where([
                        ['status','=','Approved'],
                        ])
                        ->WhereBetween('created_at',[$request->from_date, $request->to_date])
                        ->orderBy("tgl_persetujuan","desc")->get();
                }
            } else {
                $data = PengajuanEmas::with('perpanjangan_emas','anggota','versi')->where([
                    ['status','=','Approved']
                ])->orderBy("tgl_persetujuan","desc")->get();
            }
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('tgl_persetujuan',function($row){
                    return date('Y-m-d G:i',strtotime($row->perpanjangan_emas->get(0)->tgl_akad_baru));
                })
                ->addColumn('jatuh_tempo',function($row){
                    return date('Y-m-d',strtotime($row->perpanjangan_emas->get(0)->tgl_akad_baru));
                })
                ->editColumn('versi_syirkah',function($row){
                    return $row->versi->versi;
                })
                ->addColumn('nomor_ba',function($row){
                    return $row->anggota->nomor_ba;
                })
                ->addColumn('nama_lengkap',function($row){
                    return $row->anggota->nama_lengkap;
                })
                ->editColumn('nominal', function($row){
                    return $row->total_gramasi." Gram";
                })
                ->addColumn('tindak_lanjut', function($row){
                    $btn = '<a href="emas/action/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-calendar-start"></i></a>';
                    return $btn;
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="emas/detail/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-card-search-outline"></i></a>';
                    $btn .= '<a id="lihat-sertifikat" data-id="'.$row->id.'" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-lihat-sertifikat"> <i class="mdi mdi-printer"></i></a>';
                    $btn .= '<a id="upload-sertifikat" data-id="'.$row->id.'" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-upload-sertifikat"> <i class="mdi mdi-cloud-upload"></i></a>';
                    $btn .= '<a href="" class="action-icon"> <i class="mdi mdi-whatsapp"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','tindak_lanjut'])
                ->make(true);
        }
        return view('admin_view/dsyirkah_aktif/emas/index');
    }
    public function export_emas()
    {
        return Excel::download(new AktifEmasEx, 'aktif_emas.csv');
    }
    public function emas_action($id){
        $pengajuan = PengajuanEmas::with('anggota','rincian_pengajuan_emas','perpanjangan_emas')->where('slug',$id)->first();
        return view('admin_view/dsyirkah_aktif/emas/action',compact('pengajuan','id'));
    }
    public function emas_detail($id){
        $pengajuan = PengajuanEmas::with('anggota','rincian_pengajuan_emas','perpanjangan_emas')->where('slug',$id)->first();
        return view('admin_view/dsyirkah_aktif/emas/detail',compact('pengajuan','id'));
    }
    public function emas_stop(Request $request,$id){
        PengajuanEmas::where('slug',$id)->update(['status'=>'Non Aktif']);
        $pengajuan = PengajuanEmas::where('slug',$id)->first();
        $stop = new NonAktifEmas;
        $stop->pengajuan_id = $pengajuan->id;
        $stop->anggota_id = $pengajuan->anggota_id;
        $stop->kode_sertifikat = $pengajuan->kode_sertifikat;
        $stop->tanggal_non_aktif = date("Y-m-d");
        $stop->kategori = $request->kategori;
        $stop->kebutuhan = $request->kebutuhan == "" ? $request->kebutuhan_lainnya : $request->kebutuhan;
        $stop->keterangan = $request->keterangan;
        $stop->status = "Proses";
        $stop->save();
        return redirect('/admin/dsyirkah_aktif/emas')->with('success','Berhasil stop');
    }
    public function emas_approve(Request $request,$id){
        if($request->old_id_perpanjangan){
            $oldCount = count($request->old_id_perpanjangan);
            for($i = 0; $i < $oldCount; $i++){
                $angka = $request->old_perpanjangan_id[$i];
                $oldPerpanjangan = PerpanjanganEmas::find($request->old_id_perpanjangan[$i]);
                $oldPerpanjangan->jatuh_tempo_sebelumnya = $request->old_jatuh_tempo_sebelumnya[$i];
                $oldPerpanjangan->tgl_akad_baru  = $request->old_tgl_akad_baru[$i];
                $oldPerpanjangan->jatuh_tempo_akan_datang = $request->old_jatuh_tempo_akan_datang[$i];
                $oldPerpanjangan->status = $request->old_status[$i];
                $oldPerpanjangan->jangka_waktu = $request->old_jangka_waktu[$i];
                $oldPerpanjangan->nisbah = $request->old_nisbah[$i];
                $oldPerpanjangan->save();
            }
        }

        if($request->new_jatuh_tempo_sebelumnya){
            $newCount = count($request->new_jatuh_tempo_sebelumnya);
            for($i = 0; $i < $newCount; $i++){
                $newPerpanjangan = new PerpanjanganEmas;
                $newPerpanjangan->pengajuan_id = $request->pengajuan_id;
                $newPerpanjangan->jatuh_tempo_sebelumnya = $request->new_jatuh_tempo_sebelumnya[$i];
                $newPerpanjangan->tgl_akad_baru  = $request->new_tgl_akad_baru[$i];
                $newPerpanjangan->jangka_waktu = $request->new_jangka_waktu[$i];
                $newPerpanjangan->jatuh_tempo_akan_datang = $request->new_jatuh_tempo_akan_datang[$i];
                $newPerpanjangan->nisbah = $request->new_nisbah[$i];
                $newPerpanjangan->status = $request->new_status[$i];
                $newPerpanjangan->save();
            }
        }
        return redirect()->back()->with('success','Berhasil approve');
    }
    public function rupiah_index(Request $request){
        if($request->ajax()) {
            if(!empty($request->from_date)) {
                if($request->from_date == $request->to_date){
                    $data = PengajuanRupiah::with('perpanjangan_rupiah','anggota','versi')->where([
                        ['status','=','Approved'],
                    ])
                    ->whereDate('created_at',$request->from_date)
                    ->orderBy("tgl_persetujuan","desc")->get();
                } else {
                    $data = PengajuanRupiah::with('perpanjangan_rupiah','anggota','versi')->where([
                        ['status','=','Approved'],
                        ])
                        ->WhereBetween('created_at',[$request->from_date, $request->to_date])
                        ->orderBy("tgl_persetujuan","desc")->get();
                }
            } else {
                $data = PengajuanRupiah::with('perpanjangan_rupiah','anggota','versi')->where([
                    ['status','=','Approved']
                ])->orderBy("tgl_persetujuan","desc")->get();
            }
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('nominal',function($row){
                    return $row->nominal();
                })
                ->addColumn('tgl_persetujuan',function($row){
                    return date('Y-m-d G:i',strtotime($row->perpanjangan_rupiah->get(0)->tgl_akad_baru));
                })
                ->editColumn('versi_syirkah',function($row){
                    return $row->versi->versi;
                })
                ->addColumn('jatuh_tempo',function($row){
                    return date('Y-m-d',strtotime($row->perpanjangan_rupiah->get(0)->jatuh_tempo_akan_datang));
                })
                ->addColumn('nomor_ba',function($row){
                    return $row->anggota->nomor_ba;
                })
                ->addColumn('nama_lengkap',function($row){
                    return $row->anggota->nama_lengkap;
                })
                ->addColumn('tindak_lanjut', function($row){
                    $btn = '<a href="rupiah/action/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-calendar-start"></i></a>';
                    return $btn;
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="rupiah/detail/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-card-search-outline"></i></a>';
                    $btn .= '<a id="lihat-sertifikat" data-id="'.$row->id.'" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-lihat-sertifikat"> <i class="mdi mdi-printer"></i></a>';
                    $btn .= '<a id="upload-sertifikat" data-id="'.$row->id.'" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-upload-sertifikat"> <i class="mdi mdi-cloud-upload"></i></a>';
                    $btn .= '<a href="" class="action-icon"> <i class="mdi mdi-whatsapp"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','tindak_lanjut'])
                ->make(true);
        }
        return view('admin_view/dsyirkah_aktif/rupiah/index');
    }
    public function rupiah_action($id){
        $pengajuan = PengajuanRupiah::with('anggota','perpanjangan_rupiah')->where('slug',$id)->first();
        return view('admin_view/dsyirkah_aktif/rupiah/action',compact('pengajuan','id'));
    }
    public function rupiah_detail($id){
        $pengajuan = PengajuanRupiah::with('anggota','perpanjangan_rupiah')->where('slug',$id)->first();
        return view('admin_view/dsyirkah_aktif/rupiah/detail',compact('pengajuan','id'));
    }
    public function rupiah_stop($id, Request $request){
        PengajuanRupiah::where('slug',$id)->update(['status'=>'Non Aktif']);
        $pengajuan = PengajuanRupiah::where('slug',$id)->first();
        $stop = new NonAktifRupiah;
        $stop->pengajuan_id = $pengajuan->id;
        $stop->anggota_id = $pengajuan->anggota_id;
        $stop->kode_sertifikat = $pengajuan->kode_sertifikat;
        $stop->tanggal_non_aktif = date("Y-m-d");
        $stop->kategori = $request->kategori;
        $stop->kebutuhan = $request->kebutuhan == "" ? $request->kebutuhan_lainnya : $request->kebutuhan;
        $stop->keterangan = $request->keterangan;
        $stop->status = "Proses";
        $stop->save();
        return redirect('/admin/dsyirkah_aktif/rupiah')->with('success','Berhasil stop');
    }
    public function rupiah_approve($id, Request $request){
        if($request->old_id_perpanjangan){
            $oldCount = count($request->old_id_perpanjangan);
            for($i = 0; $i < $oldCount; $i++){
                $angka = $request->old_perpanjangan_id[$i];
                $oldPerpanjangan = PerpanjanganRupiah::find($request->old_id_perpanjangan[$i]);
                $oldPerpanjangan->jatuh_tempo_sebelumnya = $request->old_jatuh_tempo_sebelumnya[$i];
                $oldPerpanjangan->tgl_akad_baru  = $request->old_tgl_akad_baru[$i];
                $oldPerpanjangan->jatuh_tempo_akan_datang = $request->old_jatuh_tempo_akan_datang[$i];
                $oldPerpanjangan->jangka_waktu = $request->old_jangka_waktu[$i];
                $oldPerpanjangan->nisbah = $request->old_nisbah[$i];
                $oldPerpanjangan->status = $request->old_status[$i];
                $oldPerpanjangan->save();
            }
        }

        if($request->new_jatuh_tempo_sebelumnya){
            $newCount = count($request->new_jatuh_tempo_sebelumnya);
            for($i = 0; $i < $newCount; $i++){
                $newPerpanjangan = new PerpanjanganRupiah;
                $newPerpanjangan->pengajuan_id = $request->pengajuan_id;
                $newPerpanjangan->jatuh_tempo_sebelumnya = $request->new_jatuh_tempo_sebelumnya[$i];
                $newPerpanjangan->tgl_akad_baru  = $request->new_tgl_akad_baru[$i];
                $newPerpanjangan->jangka_waktu = $request->new_jangka_waktu[$i];
                $newPerpanjangan->jatuh_tempo_akan_datang = $request->new_jatuh_tempo_akan_datang[$i];
                $newPerpanjangan->nisbah = $request->new_nisbah[$i];
                $newPerpanjangan->status = $request->new_status[$i];
                $newPerpanjangan->save();
            }
        }
        return redirect()->back()->with('success','Berhasil approve');
    }
    public function export_rupiah()
    {
        return Excel::download(new AktifRupiahEx, 'aktif_rupiah.csv');
    }

    public function emas_perpanjangan_delete($id)
    {
        $rincian_emas = PerpanjanganEmas::find($id);
        $rincian_emas->delete();
        return response()->json(['success'=>'Data berhasil dihapus']);
    }

    public function rupiah_perpanjangan_delete($id)
    {
        $rincian_rupiah = PerpanjanganRupiah::find($id);
        $rincian_rupiah->delete();
        return response()->json(['success'=>'Data berhasil dihapus']);
    }
}
