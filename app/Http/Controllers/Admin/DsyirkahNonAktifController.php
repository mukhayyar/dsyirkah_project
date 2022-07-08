<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\NonAktifEmas;
use Illuminate\Http\Request;
use App\Models\NonAktifRupiah;
use App\Http\Controllers\Controller;

class DsyirkahNonAktifController extends Controller
{
    public function emas_index(Request $request){
        if($request->ajax()) {
            $data = NonAktifEmas::with('pengajuan','anggota')->orderBy("tanggal_non_aktif","desc")->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('nomor_ba',function($row){
                    return $row->anggota->nomor_ba;
                })
                ->addColumn('nama_lengkap',function($row){
                    return $row->anggota->nama_lengkap;
                })
                ->addColumn('total_emas',function($row){
                    return $row->pengajuan->total_gramasi;
                })
                ->addColumn('jenis',function($row){
                    return $row->pengajuan->jenis_syirkah;
                })
                ->addColumn('pengiriman', function($row){
                    $btn = '';
                    if($row->tanggal_pengiriman_barang == ''){
                        $btn = '<a id="upload-pengiriman" data-id="'.$row->id.'" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-upload-pengiriman"><i class="mdi mdi-file-upload"></i></a>';
                    }
                    $btn .= '<a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-update"></i></a>';
                    return $btn;
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="emas/'.$row->id.'/detail" class="action-icon"> <i class="mdi mdi-card-search-outline"></i></a>';
                    $btn .= '<a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-file-restore-outline"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','pengiriman'])
                ->make(true);
        }
        return view('admin_view/dsyirkah_nonaktif/emas/index');
    }
    public function emas_detail($id){
        $non_aktif = NonAktifEmas::with('pengajuan','anggota')->where('id',$id)->first();
        return view('admin_view/dsyirkah_nonaktif/emas/detail',compact('non_aktif','id'));
    }
    public function emas_upload_transfer(Request $request,$id)
    {
        $non_aktif = NonAktifEmas::find($id);
        if($request->file('file_transfer')){
            $name = $request->file('file_transfer')->getClientOriginalName();
            $path = $request->file('file_transfer')->move(public_path().'/images/data_penting/bukti_pengiriman/',$name);
            $non_aktif->foto_pengiriman = $name;
        }
        $non_aktif->tanggal_pengiriman_barang = $request->tanggal_pengiriman;
        $non_aktif->save();
        return redirect()->back()->with('success','');
    }
    public function rupiah_index(Request $request){
        if($request->ajax()) {
            $data = NonAktifRupiah::with('pengajuan','anggota')->orderBy("tanggal_non_aktif","desc")->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('nomor_ba',function($row){
                    return $row->anggota->nomor_ba;
                })
                ->addColumn('nama_lengkap',function($row){
                    return $row->anggota->nama_lengkap;
                })
                ->addColumn('nominal',function($row){
                    return $row->pengajuan->nominal;
                })
                ->addColumn('jenis',function($row){
                    return $row->pengajuan->jenis_syirkah;
                })
                ->addColumn('pengiriman', function($row){
                    $btn = '';
                    if($row->tanggal_pengiriman_barang == '' ){
                        $btn = '<a id="upload-pengiriman" data-id="'.$row->id.'" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-upload-pengiriman"><i class="mdi mdi-file-upload"></i></a>';
                    }
                    $btn .= '<a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-update"></i></a>';
                    return $btn;
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="rupiah/'.$row->id.'/detail" class="action-icon"> <i class="mdi mdi-card-search-outline"></i></a>';
                    $btn .= '<a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-file-restore-outline"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','pengiriman'])
                ->make(true);
        }
        return view('admin_view/dsyirkah_nonaktif/rupiah/index');
    }
    public function rupiah_detail($id){
        $non_aktif = NonAktifRupiah::with('pengajuan','anggota')->where('id',$id)->first();
        return view('admin_view/dsyirkah_nonaktif/rupiah/detail',compact('non_aktif','id'));
    }
    public function rupiah_upload_transfer(Request $request,$id)
    {
        $non_aktif = NonAktifRupiah::find($id);
        if($request->file('file_transfer')){
            $name = $request->file('file_transfer')->getClientOriginalName();
            $path = $request->file('file_transfer')->move(public_path().'/images/data_penting/bukti_pengiriman/',$name);
            $non_aktif->foto_pengiriman = $name;
        }
        $non_aktif->tanggal_pengiriman_barang = $request->tanggal_pengiriman;
        $non_aktif->save();
        return redirect()->back()->with('success','');
    }
}
