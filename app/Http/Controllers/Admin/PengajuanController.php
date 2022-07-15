<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Usaha;
use App\Models\Perwada;
use App\Models\ItemEmas;
use Illuminate\Http\Request;
use App\Models\PengajuanEmas;
use App\Models\PengajuanRupiah;
use App\Exports\PengajuanEmasEx;
use App\Models\PerpanjanganEmas;
use App\Exports\PengajuanRupiahEx;
use App\Models\PerpanjanganRupiah;
use App\Http\Controllers\Controller;
use App\Models\RincianPengajuanEmas;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PengajuanEmasRejectEx;
use App\Exports\PengajuanRupiahRejectEx;

class PengajuanController extends Controller
{
    public function emas_index(Request $request){
        if($request->ajax()) {
            if(!empty($request->from_date)) {
                if($request->from_date == $request->to_date){
                    $data = PengajuanEmas::with('versi','anggota')
                    ->where([
                        ['status','!=','Reject'],
                    ])
                    ->whereDate('created_at',$request->from_date)
                    ->orderBy("created_at","desc")->get();
                } else {
                    $data = PengajuanEmas::with('versi','anggota')
                    ->where([
                        ['status','!=','Reject']
                    ])
                    ->whereDate('created_at','>=',$request->from_date)
                    ->whereDate('created_at','<=',$request->to_date)
                    ->orderBy("created_at","desc")->get();
                }
            } else {
                $data = PengajuanEmas::with('versi','anggota')->where([
                    ['status','!=','Reject']
                ])->orderBy("created_at","desc")->get();
            }
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('approval', function($row){
                    $btn = '<a href="emas/approval/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-archive-check"></i></a>';
                    return $btn;
                })
                ->editColumn('created_at',function($row){
                    return date('Y-m-d G:i',strtotime($row->created_at));
                })
                ->editColumn('versi_syirkah',function($row){
                    return $row->versi->versi;
                })
                ->editColumn('status', function($row){
                    if($row->status == 'Approved'){
                        $btn = "<span class='badge badge-success-lighten'>Approved</span>";
                        return $btn;
                    } else if($row->status == 'Pengajuan'){
                        $btn = "<span class='badge badge-warning-lighten'>Pengajuan</span>";
                        return $btn;
                    } else {
                        $btn = "<span class='badge badge-danger-lighten'>Non Aktif</span>";
                        return $btn;
                    }
                })
                ->editColumn('nominal', function($row){
                    return $row->total_gramasi." Gram";
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="emas/detail/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-card-search-outline"></i></a>';
                    if($row->status != 'Approved'){
                        $btn .= '<a href="emas/edit/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action','approval','status'])
                ->make(true);
        }
        return view('admin_view/pengajuan_dsyirkah/emas/index');
    }
    public function export_emas_reject()
    {
        return Excel::download(new PengajuanEmasRejectEx, 'pengajuan_emas.csv');
    }
    public function export_emas()
    {
        return Excel::download(new PengajuanEmasEx, 'pengajuan_emas.csv');
    }
    public function reject_pengajuan_emas($id){
        PengajuanEmas::where('slug','=',$id)->update(['status'=>'Reject']);
        return redirect('/admin/pengajuan_dsyirkah/emas/reject');
    }
    public function restore_pengajuan_emas($id){
        PengajuanEmas::where('slug','=',$id)->update(['status'=>'Pengajuan']);
        return redirect('/admin/pengajuan_dsyirkah/emas');
    }
    public function emas_approval($id){
        $pengajuan = PengajuanEmas::with('anggota','rincian_pengajuan_emas','versi')->where('slug',$id)->first();
        return view('admin_view/pengajuan_dsyirkah/emas/approval',compact('pengajuan','id'));
    }
    public function emas_approval_store(Request $request, $id){
        PengajuanEmas::where('slug','=',$id)->update(['status'=>'Approved']);
        $pengajuan = PengajuanEmas::with('anggota')->where('slug',$id)->first();
        $check_no = PengajuanEmas::where([
            ['pilihan_program','=',$pengajuan->pilihan_program],
            ['jenis_syirkah','=',$pengajuan->jenis_syirkah],
            ['kode_sertifikat','!=',null]
        ])->latest()->first();
        $pengajuan_emas = new PengajuanEmas;
        if($pengajuan->jenis_syirkah == "Mutlaqah"){
            $generate_no = $pengajuan_emas->generate_no_sertifikat_mt($check_no, $pengajuan);
        } else {
            $generate_no = $pengajuan_emas->generate_no_sertifikat_mq($check_no, $pengajuan);
        }
        $pengajuan->kode_sertifikat = $generate_no;
        $pengajuan->tgl_persetujuan = $request->today;
        $pengajuan->save();
        if($pengajuan->kode_usaha){
            $usaha = Usaha::where('kode_usaha','=',$pengajuan->kode_usaha)->first();
            $usaha->capaian_muqayyadah += $pengajuan->total_gramasi;
            $usaha->save();
        }
        if($pengajuan->pilihan_program == "reguler"){
            $perpanjangan = new PerpanjanganEmas;
            $perpanjangan->pengajuan_id = $pengajuan->id;
            $perpanjangan->tgl_akad_baru = $request->today;
            $perpanjangan->jangka_waktu = $pengajuan->jangka_waktu;
            $perpanjangan->jatuh_tempo_akan_datang = date('Y-m-d', strtotime($request->today. ' + '.$pengajuan->jangka_waktu.' months'));
            $perpanjangan->nisbah = $pengajuan->nisbah;
            $perpanjangan->status = "Approved";
            $perpanjangan->save();
            return redirect('/admin/pengajuan_dsyirkah/emas');
        }
        $perpanjangan = new PerpanjanganEmas;
        $perpanjangan->pengajuan_id = $pengajuan->id;
        $perpanjangan->tgl_akad_baru = $request->today;
        $perpanjangan->jangka_waktu = $pengajuan->jangka_waktu;
        $perpanjangan->jatuh_tempo_akan_datang = date('Y-m-d', strtotime($request->today. ' + 12 months'));
        $perpanjangan->nisbah = $pengajuan->nisbah;
        $perpanjangan->status = "Approved";
        $perpanjangan->save();
        return redirect('/admin/pengajuan_dsyirkah/emas');
    }
    public function emas_detail($id){
        $pengajuan = PengajuanEmas::with('anggota','versi')->where('slug',$id)->first();
        return view('admin_view/pengajuan_dsyirkah/emas/detail',compact('pengajuan'));
    }
    public function emas_reject(Request $request){
        if($request->ajax()) {
            if(!empty($request->from_date)) {
                if($request->from_date == $request->to_date){
                    $data = PengajuanEmas::with('versi','anggota')
                    ->where([
                        ['status','=','Reject']
                    ])
                    ->whereDate('created_at',$request->from_date)
                    ->orderBy("created_at","desc")->get();
                } else {
                    $data = PengajuanEmas::with('versi','anggota')
                    ->where([
                        ['status','=','Reject']
                        ])
                        ->whereDate('created_at','>=',$request->from_date)
                        ->whereDate('created_at','<=',$request->to_date)
                        ->orderBy("created_at","desc")->get();
                }
            } else {
                $data = PengajuanEmas::with('versi','anggota')->where([
                    ['status','=','Reject']
                ])->orderBy("created_at","desc")->get();
            }
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at',function($row){
                    return date('Y-m-d G:i',strtotime($row->created_at));
                })
                ->editColumn('versi_syirkah',function($row){
                    return $row->versi->versi;
                })
                ->editColumn('status', function($row){
                    if($row->status == 'Approved'){
                        $btn = "<span class='badge badge-success-lighten'>Approved</span>";
                        return $btn;
                    } else if($row->status == 'Pengajuan'){
                        $btn = "<span class='badge badge-warning-lighten'>Pengajuan</span>";
                        return $btn;
                    } else {
                        $btn = "<span class='badge badge-danger-lighten'>Non Aktif</span>";
                        return $btn;
                    }
                })
                ->editColumn('nominal', function($row){
                    return $row->total_gramasi." Gram";
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="detail/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-card-search-outline"></i></a>';
                    $btn .= '<a href="reject/restore/'.$row->slug.'" onclick="event.preventDefault(); document.getElementById("restore-form").submit();" class="action-icon"> <i class="mdi mdi-file-restore"></i></a>';
                    $btn .= '<form id="restore-form" action="reject/restore/'.$row->slug.'" method="POST" class="d-none"> @csrf </form>';
                    return $btn;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return view('admin_view/pengajuan_dsyirkah/emas/reject');
    }
    public function emas_edit($id){
        $pengajuan = PengajuanEmas::with('anggota','versi')->where('slug',$id)->first();
        $perwada = Perwada::where('status','Aktif')->get();
        $item_emas_show = ItemEmas::where('status',1)->get();
        return view('admin_view/pengajuan_dsyirkah/emas/edit',compact('pengajuan','perwada','item_emas_show'));
    }
    public function rupiah_index(Request $request){
        if($request->ajax()) {
            if(!empty($request->from_date)) {
                if($request->from_date == $request->to_date){
                    $data = PengajuanRupiah::with('versi','anggota')
                    ->where([
                        ['status','!=','Reject'],
                    ])
                    ->whereDate('created_at',$request->from_date)
                    ->orderBy("created_at","desc")->get();
                } else {
                    $data = PengajuanRupiah::with('versi','anggota')
                    ->where([
                        ['status','!=','Reject']
                        ])
                        ->whereDate('created_at','>=',$request->from_date)
                        ->whereDate('created_at','<=',$request->to_date)
                        ->orderBy("created_at","desc")->get();
                }
            } else {
                $data = PengajuanRupiah::with('versi','anggota')->where([
                    ['status','!=','Reject']
                ])->orderBy("created_at","desc")->get();
            }
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('approval', function($row){
                    $btn = '<a href="rupiah/approval/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-archive-check"></i></a>';
                    return $btn;
                })
                ->editColumn('created_at',function($row){
                    return date('Y-m-d G:i',strtotime($row->created_at));
                })
                ->editColumn('versi_syirkah',function($row){
                    return $row->versi->versi;
                })
                ->editColumn('status', function($row){
                    if($row->status == 'Approved'){
                        $btn = "<span class='badge badge-success-lighten'>Approved</span>";
                        return $btn;
                    } else if($row->status == 'Pengajuan'){
                        $btn = "<span class='badge badge-warning-lighten'>Pengajuan</span>";
                        return $btn;
                    } else {
                        $btn = "<span class='badge badge-danger-lighten'>Non Aktif</span>";
                        return $btn;
                    }
                })
                ->editColumn('nominal', function($row){
                    return "Rp. ".number_format($row->nominal,0,",",".").",-";
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="rupiah/detail/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-card-search-outline"></i></a>';
                    if($row->status == 'Pengajuan'){
                        $btn .= '<a href="rupiah/edit/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action','approval','status'])
                ->make(true);
        }
        return view('admin_view/pengajuan_dsyirkah/rupiah/index');   
    }
    public function reject_pengajuan_rupiah($id){
       PengajuanRupiah::where('slug','=',$id)->update(['status'=>'Reject']);
       return redirect('/admin/pengajuan_dsyirkah/rupiah/reject');
    }
    public function restore_pengajuan_rupiah($id){
       PengajuanRupiah::where('slug','=',$id)->update(['status'=>'Pengajuan']);
       return redirect('/admin/pengajuan_dsyirkah/rupiah');
    }
    public function rupiah_approval($id){
        $pengajuan = PengajuanRupiah::with('anggota','versi')->where('slug',$id)->first();
        return view('admin_view/pengajuan_dsyirkah/rupiah/approval',compact('pengajuan','id'));
    }
    public function rupiah_approval_store(Request $request, $id){
        PengajuanRupiah::where('slug','=',$id)->update(['status'=>'Approved']);
        $pengajuan = PengajuanRupiah::with('anggota')->where('slug',$id)->first();
        $check_no = PengajuanRupiah::where([
            ['pilihan_program','=',$pengajuan->pilihan_program],
            ['jenis_syirkah','=',$pengajuan->jenis_syirkah],
            ['kode_sertifikat','!=',null]
        ])->latest()->first();
        $pengajuan_rupiah = new PengajuanRupiah;
        if($pengajuan->jenis_syirkah == "Mutlaqah"){
            $generate_no = $pengajuan_rupiah->generate_no_sertifikat_mt($check_no, $pengajuan);
        } else {
            $generate_no = $pengajuan_rupiah->generate_no_sertifikat_mq($check_no, $pengajuan);
        }
        $pengajuan->kode_sertifikat = $generate_no;
        $pengajuan->tgl_persetujuan = $request->today;
        $pengajuan->save();
        if($pengajuan->kode_usaha){
            $usaha = Usaha::where('kode_usaha','=',$pengajuan->kode_usaha)->first();
            $usaha->capaian_muqayyadah += $pengajuan->nominal;
            $usaha->save();
        }
        if($pengajuan->pilihan_program == "reguler"){
            $perpanjangan = new PerpanjanganRupiah;
            $perpanjangan->pengajuan_id = $pengajuan->id;
            $perpanjangan->tgl_akad_baru = $request->today;
            $perpanjangan->jangka_waktu = $pengajuan->jangka_waktu;
            $perpanjangan->jatuh_tempo_akan_datang = date('Y-m-d', strtotime($request->today. ' + '.$pengajuan->jangka_waktu.' months'));
            $perpanjangan->nisbah = $pengajuan->nisbah;
            $perpanjangan->status = "Approved";
            $perpanjangan->save();
            return redirect('/admin/pengajuan_dsyirkah/rupiah');
        }
        $perpanjangan = new PerpanjanganRupiah;
        $perpanjangan->pengajuan_id = $pengajuan->id;
        $perpanjangan->tgl_akad_baru = $request->today;
        $perpanjangan->jangka_waktu = $pengajuan->jangka_waktu;
        $perpanjangan->jatuh_tempo_akan_datang = date('Y-m-d', strtotime($request->today. ' + 12 months'));
        $perpanjangan->nisbah = $pengajuan->nisbah;
        $perpanjangan->status = "Approved";
        $perpanjangan->save();
        return redirect('/admin/pengajuan_dsyirkah/rupiah');
    }
    public function rupiah_detail($id){
        $pengajuan = PengajuanRupiah::with('anggota','versi')->where('slug',$id)->first();
        return view('admin_view/pengajuan_dsyirkah/rupiah/detail',compact('pengajuan'));
    }
    public function rupiah_reject(Request $request){
        if($request->ajax()) {
            if(!empty($request->from_date)) {
                if($request->from_date == $request->to_date){
                    $data = PengajuanRupiah::with('versi','anggota')
                    ->where([
                        ['status','=','Reject']
                    ])
                    ->whereDate('created_at',$request->from_date)
                    ->orderBy("created_at","desc")->get();
                } else {
                    $data = PengajuanRupiah::with('versi','anggota')
                    ->where([
                        ['status','=','Reject']
                        ])
                        ->whereDate('created_at','>=',$request->from_date)
                        ->whereDate('created_at','<=',$request->to_date)
                        ->orderBy("created_at","desc")->get();
                }
            } else {
                $data = PengajuanRupiah::with('versi','anggota')->where([
                    ['status','=','Reject']
                ])->orderBy("created_at","desc")->get();
            }
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="reject/detail/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-card-search-outline"></i></a>';
                    $btn .= '<a href="reject/restore/'.$row->slug.'" onclick="event.preventDefault(); document.getElementById("restore-form").submit();" class="action-icon"> <i class="mdi mdi-file-restore"></i></a>';
                    $btn .= '<form id="restore-form" action="reject/restore/'.$row->slug.'" method="POST" class="d-none"> @csrf </form>';
                    return $btn;
                })
                ->editColumn('created_at',function($row){
                    return date('Y-m-d G:i',strtotime($row->created_at));
                })
                ->editColumn('versi_syirkah',function($row){
                    return $row->versi->versi;
                })
                ->editColumn('status', function($row){
                    if($row->status == 'Approved'){
                        $btn = "<span class='badge badge-success-lighten'>Approved</span>";
                        return $btn;
                    } else if($row->status == 'Pengajuan'){
                        $btn = "<span class='badge badge-warning-lighten'>Pengajuan</span>";
                        return $btn;
                    } else {
                        $btn = "<span class='badge badge-danger-lighten'>Non Aktif</span>";
                        return $btn;
                    }
                })
                ->editColumn('nominal', function($row){
                    return "Rp. ".number_format($row->nominal,0,",",".").",-";
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return view('admin_view/pengajuan_dsyirkah/rupiah/reject');
    }
    public function rupiah_edit($id){
        $pengajuan = PengajuanRupiah::with('anggota','versi')->where('slug',$id)->first();
        $perwada = Perwada::where('status','Aktif')->get();
        return view('admin_view/pengajuan_dsyirkah/rupiah/edit',compact('pengajuan','perwada'));
    }
    public function export_rupiah()
    {
        return Excel::download(new PengajuanRupiahEx, 'pengajuan_rupiah.csv');
    }
    public function export_rupiah_reject()
    {
        return Excel::download(new PengajuanRupiahRejectEx, 'pengajuan_emas.csv');
    }
    public function rupiah_update(Request $request, $id)
    {
        $pengajuan = PengajuanRupiah::where('slug','=',$id)->first();
        // bukti tf
        if($request->file('buktiTransfer')){
            $name = $request->file('buktiTransfer')->getClientOriginalName();
            $path = $request->file('buktiTransfer')->move(public_path().'/images/data_penting/bukti_transfer/',$name);
            $pengajuan->bukti_transfer = $name;
        }
        //jangka watu
        if($request->jangka_waktu){
            $jangka_waktu = explode(",",$request->jangka_waktu);
            $jangka_waktu = $jangka_waktu[1];
        } else {
            $jangka_waktu=12;
        }
        // data lain
        $pengajuan->referensi = $request->perwada;
        $pengajuan->pilihan_program = $request->pilihanProgram;
        $pengajuan->jangka_waktu = $jangka_waktu;
        $pengajuan->jenis_syirkah = $request->jenis;
        $pengajuan->nisbah = $request->nisbah;
        $pengajuan->perpanjangan = $request->perpanjangan;
        $pengajuan->nominal = str_replace(".","",$request->nominal);
        $pengajuan->alokasi_nisbah = $request->alokasiNisbah;
        $pengajuan->persetujuan = $request->persetujuan;
        $pengajuan->catatan_edit = $request->catatan_edit;
        $pengajuan->save();
        return redirect('/admin/pengajuan_dsyirkah/rupiah')->with('success','Pengajuan sudah terkirim, untuk konfirmasi tolong hubungi admin');
    }
    public function emas_update(Request $request, $id)
    {
        // dd($request->all());
        $pengajuan = PengajuanEmas::where('slug','=',$id)->first();
        //jangka watu
        if($request->jangka_waktu){
            $jangka_waktu = explode(",",$request->jangka_waktu);
            $jangka_waktu = $jangka_waktu[1];
        } else {
            $jangka_waktu=12;
        }
        // data lain
        $pengajuan->referensi = $request->perwada;
        $pengajuan->pilihan_program = $request->pilihanProgram;
        $pengajuan->jangka_waktu = $jangka_waktu;
        $pengajuan->jenis_syirkah = $request->jenis;
        $pengajuan->nisbah = $request->nisbah;
        $pengajuan->perpanjangan = $request->perpanjangan;
        $pengajuan->persetujuan = $request->persetujuan;
        if($request->total_jumlah_emas != 'NaN'){
            $pengajuan->total_gramasi = $request->total_jumlah_emas;
        }
        $pengajuan->alokasi_nisbah = $request->alokasiNisbah;
        $pengajuan->catatan_edit = $request->catatan_edit;
        if($request->new_item_emas){
            $length = count($request->new_item_emas);
            for($i =0; $i <$length;$i++)
            {
                $rincianPengajuanEmas = new RincianPengajuanEmas;
                $rincianPengajuanEmas->pengajuan_id = $pengajuan->id;
                $rincianPengajuanEmas->emas_id = $request->new_id_emas[$i];            
                $rincianPengajuanEmas->item = $request->new_item_emas[$i];            
                $rincianPengajuanEmas->jenis = $request->new_jenis_emas[$i];            
                $rincianPengajuanEmas->gramasi = $request->new_gramasi_emas[$i];            
                $rincianPengajuanEmas->keping = $request->new_keping_emas[$i];            
                $rincianPengajuanEmas->jumlah = $request->new_jumlah_keping[$i];
                $rincianPengajuanEmas->save();            
            }
        }
        if($request->old_rincian_item_emas)
        {
            $length = count($request->old_rincian_item_emas);
            for($i =0; $i <$length;$i++)
            {
                $rincianPengajuanEmas = RincianPengajuanEmas::find($request->old_rincian_item_emas[$i]);                
                $rincianPengajuanEmas->keping = $request->old_keping_emas[$i];            
                $rincianPengajuanEmas->jumlah = $request->old_jumlah_keping[$i];
                $rincianPengajuanEmas->save();            
            }
        }
        $pengajuan->save();
        return redirect('/admin/pengajuan_dsyirkah/emas')->with('success','Pengajuan sudah terkirim, untuk konfirmasi tolong hubungi admin');
    }
    public function rincian_emas_delete($id)
    {
        $rincian_emas = RincianPengajuanEmas::find($id);
        $rincian_emas->delete();
        return response()->json(['success'=>'Data berhasil dihapus']);
    }
}
