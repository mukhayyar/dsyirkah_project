<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use Illuminate\Http\Request;
use App\Models\PengajuanEmas;
use App\Models\PengajuanRupiah;
use App\Models\PerpanjanganEmas;
use App\Models\PerpanjanganRupiah;
use App\Http\Controllers\Controller;

class PengajuanController extends Controller
{
    public function emas_index(Request $request){
        if($request->ajax()) {
            $data = PengajuanEmas::where([
                ['status','!=','Reject']
            ])->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('approval', function($row){
                    $btn = '<a href="emas/approval/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-archive-check"></i></a>';
                    return $btn;
                })
                ->editColumn('created_at',function($row){
                    return date('Y-m-d h:i',strtotime($row->created_at));
                })
                ->editColumn('status', function($row){
                    if($row->status == 'Approved'){
                        $btn = "<span class='badge badge-success-lighten'>Approved</span>";
                        return $btn;
                    } else {
                        $btn = "<span class='badge badge-warning-lighten'>Pengajuan</span>";
                        return $btn;
                    }
                })
                ->editColumn('nominal', function($row){
                    return $row->total_gramasi." Gram";
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="emas/detail/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-card-search-outline"></i></a>';
                    $btn .= '<a href="emas/edit/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','approval','status'])
                ->make(true);
        }
        return view('admin_view/pengajuan_dsyirkah/emas/index');
    }
    public function reject_pengajuan_emas($id){
        PengajuanEmas::where('slug','=',$id)->update(['status'=>'Reject']);
        return redirect()->back();
    }
    public function restore_pengajuan_emas($id){
        PengajuanEmas::where('slug','=',$id)->update(['status'=>'Pengajuan']);
        return redirect()->back();
    }
    public function emas_approval($id){
        $pengajuan = PengajuanEmas::with('anggota','rincian_pengajuan_emas')->where('slug',$id)->first();
        return view('admin_view/pengajuan_dsyirkah/emas/approval',compact('pengajuan','id'));
    }
    public function emas_approval_store($id){
        PengajuanEmas::where('slug','=',$id)->update(['status'=>'Approved']);
        $pengajuan = PengajuanEmas::with('anggota')->where('slug',$id)->first();
        if($pengajuan->pilihan_program == "reguler"){
            $perpanjangan = new PerpanjanganEmas;
            $today = date("Y-m-d");
            $perpanjangan->pengajuan_id = $pengajuan->id;
            $perpanjangan->tgl_akad_baru = $today;
            $perpanjangan->jangka_waktu = $pengajuan->jangka_waktu;
            $perpanjangan->jatuh_tempo_akan_datang = date('Y-m-d', strtotime($today. ' + '.$pengajuan->jangka_waktu.' months'));
            $perpanjangan->nisbah = $pengajuan->nisbah;
            $perpanjangan->status = "Approved";
            $perpanjangan->save();
            return redirect()->back();
        }
        $perpanjangan = new PerpanjanganEmas;
        $today = date("Y-m-d");
        $perpanjangan->pengajuan_id = $pengajuan->id;
        $perpanjangan->tgl_akad_baru = $today;
        $perpanjangan->jangka_waktu = $pengajuan->jangka_waktu;
        $perpanjangan->jatuh_tempo_akan_datang = date('Y-m-d', strtotime($today. ' + 12 months'));
        $perpanjangan->nisbah = $pengajuan->nisbah;
        $perpanjangan->status = "Approved";
        $perpanjangan->save();
        return redirect()->back();
    }
    public function emas_detail($id){
        $pengajuan = PengajuanEmas::with('anggota')->where('slug',$id)->first();
        return view('admin_view/pengajuan_dsyirkah/emas/detail',compact('pengajuan'));
    }
    public function emas_reject(Request $request){
        if($request->ajax()) {
            $data = PengajuanEmas::where('status','Reject')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="detail/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-card-search-outline"></i></a>';
                    $btn .= '<a href="reject/restore/'.$row->slug.'" onclick="event.preventDefault(); document.getElementById("restore-form").submit();" class="action-icon"> <i class="mdi mdi-file-restore"></i></a>';
                    $btn .= '<form id="restore-form" action="reject/restore/'.$row->slug.'" method="POST" class="d-none"> @csrf </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin_view/pengajuan_dsyirkah/emas/reject');
    }
    public function emas_edit($id){
        $pengajuan = PengajuanEmas::with('anggota')->where('slug',$id)->first();
        return view('admin_view/pengajuan_dsyirkah/emas/edit',compact('pengajuan'));
    }
    public function rupiah_index(Request $request){
        if($request->ajax()) {
            $data = PengajuanRupiah::where([
                ['status','!=','Reject']
            ])->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('approval', function($row){
                    $btn = '<a href="rupiah/approval/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-archive-check"></i></a>';
                    return $btn;
                })
                ->editColumn('created_at',function($row){
                    return date('Y-m-d h:i',strtotime($row->created_at));
                })
                ->editColumn('status', function($row){
                    if($row->status == 'Approved'){
                        $btn = "<span class='badge badge-success-lighten'>Approved</span>";
                        return $btn;
                    } else {
                        $btn = "<span class='badge badge-warning-lighten'>Pengajuan</span>";
                        return $btn;
                    }
                })
                ->editColumn('nominal', function($row){
                    return "Rp. ".number_format($row->nominal,0,",",".").",-";
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="rupiah/detail/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-card-search-outline"></i></a>';
                    $btn .= '<a href="rupiah/edit/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','approval','status'])
                ->make(true);
        }
        return view('admin_view/pengajuan_dsyirkah/rupiah/index');   
    }
    public function reject_pengajuan_rupiah($id){
       PengajuanRupiah::where('slug','=',$id)->update(['status'=>'Reject']);
       return redirect()->back();
    }
    public function restore_pengajuan_rupiah($id){
       PengajuanRupiah::where('slug','=',$id)->update(['status'=>'Pengajuan']);
       return redirect()->back();
    }
    public function rupiah_approval($id){
        $pengajuan = PengajuanRupiah::with('anggota')->where('slug',$id)->first();
        return view('admin_view/pengajuan_dsyirkah/rupiah/approval',compact('pengajuan','id'));
    }
    public function rupiah_approval_store($id){
        PengajuanRupiah::where('slug','=',$id)->update(['status'=>'Approved']);
        $pengajuan = PengajuanRupiah::with('anggota')->where('slug',$id)->first();
        if($pengajuan->pilihan_program == "reguler"){
            $perpanjangan = new PerpanjanganRupiah;
            $today = date("Y-m-d");
            $perpanjangan->pengajuan_id = $pengajuan->id;
            $perpanjangan->tgl_akad_baru = $today;
            $perpanjangan->jangka_waktu = $pengajuan->jangka_waktu;
            $perpanjangan->jatuh_tempo_akan_datang = date('Y-m-d', strtotime($today. ' + '.$pengajuan->jangka_waktu.' months'));
            $perpanjangan->nisbah = $pengajuan->nisbah;
            $perpanjangan->status = "Approved";
            $perpanjangan->save();
            return redirect()->back();
        }
        $perpanjangan = new PerpanjanganRupiah;
        $today = date("Y-m-d");
        $perpanjangan->pengajuan_id = $pengajuan->id;
        $perpanjangan->tgl_akad_baru = $today;
        $perpanjangan->jangka_waktu = $pengajuan->jangka_waktu;
        $perpanjangan->jatuh_tempo_akan_datang = date('Y-m-d', strtotime($today. ' + 12 months'));
        $perpanjangan->nisbah = $pengajuan->nisbah;
        $perpanjangan->status = "Approved";
        $perpanjangan->save();
        return redirect()->back();
    }
    public function rupiah_detail($id){
        $pengajuan = PengajuanRupiah::with('anggota')->where('slug',$id)->first();
        return view('admin_view/pengajuan_dsyirkah/rupiah/detail',compact('pengajuan'));
    }
    public function rupiah_reject(Request $request){
        if($request->ajax()) {
            $data = PengajuanRupiah::where('status','Reject')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="reject/detail/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-card-search-outline"></i></a>';
                    $btn .= '<a href="reject/restore/'.$row->slug.'" onclick="event.preventDefault(); document.getElementById("restore-form").submit();" class="action-icon"> <i class="mdi mdi-file-restore"></i></a>';
                    $btn .= '<form id="restore-form" action="reject/restore/'.$row->slug.'" method="POST" class="d-none"> @csrf </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin_view/pengajuan_dsyirkah/rupiah/reject');
    }
    public function rupiah_edit($id){
        $pengajuan = PengajuanRupiah::with('anggota')->where('slug',$id)->first();
        return view('admin_view/pengajuan_dsyirkah/rupiah/edit',compact('pengajuan'));
    }
}
