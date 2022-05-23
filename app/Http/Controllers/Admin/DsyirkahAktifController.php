<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use Illuminate\Http\Request;
use App\Models\PengajuanEmas;
use App\Http\Controllers\Controller;

class DsyirkahAktifController extends Controller
{
    public function emas_index(Request $request){
         if($request->ajax()) {
            $data = PengajuanEmas::with('rincian_pengajuan_emas','anggota')->where([
                ['status','=','Approved']
            ])->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('tgl_persetujuan',function($row){
                    return date('Y-m-d h:i',strtotime($row->perpanjangan_emas->get(0)->tgl_akad_baru));
                })
                ->addColumn('jatuh_tempo',function($row){
                    return date('Y-m-d',strtotime($row->perpanjangan_emas->get(0)->jatuh_tempo_akan_datang));
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
                    $btn .= '<a href="printData('.$row->id.')" class="action-icon"> <i class="mdi mdi-printer"></i></a>';
                    $btn .= '<a href="" class="action-icon"> <i class="mdi mdi-whatsapp"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','tindak_lanjut'])
                ->make(true);
        }
        return view('admin_view/dsyirkah_aktif/emas/index');
    }
    public function rupiah_index(Request $request){
         if($request->ajax()) {
            $data = PengajuanEmas::where([
                ['status','=','Approved']
            ])->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('approval', function($row){
                    $btn = '<a href="emas/approval/'.$row->slug.'" class="action-icon"> <i class="mdi mdi-archive-check"></i></a>';
                    return $btn;
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
        return view('admin_view/dsyirkah_aktif/rupiah/index');
    }
}
