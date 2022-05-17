<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use Illuminate\Http\Request;
use App\Models\PengajuanEmas;
use App\Models\PengajuanRupiah;
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
                ->addColumn('action', function($row){
                    $btn = '<a href="emas/detail/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-card-search-outline"></i></a>';
                    $btn .= '<a href="emas/edit/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','approval'])
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
        $pengajuan = PengajuanEmas::with('anggota')->where('slug',$id)->get();
        dd($pengajuan);
        return view('admin_view/pengajuan_dsyirkah/emas/approval',compact('pengajuan'));
    }
    public function emas_approval_store($id){
        PengajuanEmas::where('slug','=',$id)->update(['status'=>'Approved']);
        return redirect()->back();
    }
    public function emas_detail($id){
        return view('admin_view/pengajuan_dsyirkah/emas/detail');
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
        return view('admin_view/pengajuan_dsyirkah/emas/edit');
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
                ->addColumn('action', function($row){
                    $btn = '<a href="rupiah/detail/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-card-search-outline"></i></a>';
                    $btn .= '<a href="rupiah/edit/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','approval'])
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
        return redirect()->back();
    }
    public function rupiah_detail($id){
        return view('admin_view/pengajuan_dsyirkah/rupiah/detail');
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
        return view('admin_view/pengajuan_dsyirkah/rupiah/edit');
    }
}
