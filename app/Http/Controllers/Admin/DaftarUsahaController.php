<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Usaha;
use App\Models\UsahaImages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaftarUsahaController extends Controller
{
    public function usaha_basis_emas_page(Request $request){
        if($request->ajax()) {
            $data = Usaha::where('jenis_form','emas')->orWhere('kebutuhan_emas','!=',null)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('status_post', function($row){
                    if($row->status_post == "draf" || $row->status_post == "Draf"){
                        $btn = "<span class='badge badge-info-lighten'>Draf</span>";
                        return $btn;
                    }else if($row->status_post == "posting" || $row->status_post == "Posting") {
                        $btn = "<span class='badge badge-primary-lighten'>Posting</span>";
                        return $btn;
                    } else {
                        $btn = "<span class='badge badge-danger-lighten'>Cancel</span>";
                        return $btn;
                    } 
                })
                ->editColumn('status_dana', function($row){
                    if($row->status_dana){
                        $btn = "<span class='badge badge-success-lighten'>Aktif</span>";
                        return $btn;
                    } else {
                        $btn = "<span class='badge badge-danger-lighten'>Non Aktif</span>";
                        return $btn;
                    } 
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0);" data-id="'.$row->id.'" class="action-icon viewAkun"> <i class="mdi mdi-card-search-outline"></i></a>';
                    $btn = $btn.'<a href="usaha_basis_emas/'.$row->id.'/edit" class="action-icon editAkun"> <i class="mdi mdi-square-edit-outline"></i></a>';
                    return $btn;
                })
                ->rawColumns(['status_post','action','status_dana'])
                ->make(true);
        }
        return view('admin_view/daftar_usaha/usaha_basis_emas/index');
    }
    public function create_usaha_basis_emas_page(){
        return view('admin_view/daftar_usaha/usaha_basis_emas/create');
    }
    public function edit_usaha_basis_emas_page($id){
        $usaha = Usaha::with('usahaImages')->find($id);
        return view('admin_view/daftar_usaha/usaha_basis_emas/create',compact('usaha'));
    }
    public function edit_usaha_basis_emas(){
        return view('admin_view/daftar_usaha/usaha_basis_emas/create');
    }
    public function create_usaha_basis_emas(Request $request){
        if($request->hasfile('gallery')){
            foreach($request->file('gallery') as $image){
                $name = $image->getClientOriginalName();
                $image->move(public_path().'/images/',rand().$name);
                $data[] = $name;
            }
        }
        if($request->hasfile('proposal')){
            $file = $request->file('proposal');
            $proposalName = $file->getClientOriginalName();
            $file->move(public_path().'/proposal/',rand().$proposalName);
        }
        if($request->hasfile('thumbnail')){
            $file = $request->file('thumbnail');
            $thumbnailName = $file->getClientOriginalName();
            $file->move(public_path().'/images/',rand().$thumbnailName);
        }
        $usaha = new Usaha;
        $usaha->judul = $request->judul_usaha;
        $usaha->profil = $request->profil_usaha;
        $usaha->legalitas = $request->legalitas;
        $usaha->status_post = $request->status_post;
        $usaha->tanggal_post = $request->tanggal_post;
        $usaha->user_create = auth()->user()->id;
        $usaha->jenis_usaha = $request->kategori;
        $usaha->jenis_akad = $request->jenis_akad;
        $usaha->pemilik = $request->pemilik;
        $usaha->jenis_form = $request->jenis_form_bentuk;
        $usaha->status_dana = $request->status_dana;
        $usaha->kebutuhan_emas = $request->kebutuhan;
        $usaha->jangka_waktu = $request->jangka_waktu;
        $usaha->capaian_muqayyadah = $request->capaian;
        $usaha->proposal = $proposalName;
        $usaha->thumbnail = $thumbnailName;
        $usaha->save();
        // upload multiple image ke images usaha
        $images_usaha = new UsahaImages;
        $images_usaha->usaha_id = $usaha->id;
        $images_usaha->nama = \json_encode($data);
        $images_usaha->save();
        return redirect()->route('admin.usaha_basis_rupiah');
    }
    public function update_usaha_basis_emas(Request $request,$id){
        $usaha = Usaha::find($id);
        if($request->hasfile('gallery')){
            foreach($request->file('gallery') as $image){
                $name = $image->getClientOriginalName();
                $image->move(public_path().'/images/',rand().$name);
                $data[] = $name;
            }
             // upload multiple image ke images usaha
            $images_usaha = UsahaImages::where('usaha_id',$id)->first();
            $images_usaha->nama = \json_encode($data);
            $images_usaha->save();
        } 
        if($request->hasfile('proposal')){
            $file = $request->file('proposal');
            $proposalName = $file->getClientOriginalName();
            $file->move(public_path().'/proposal/',rand().$proposalName);
            $usaha->proposal = $proposalName;
        }
        if($request->hasfile('thumbnail')){
            $file = $request->file('thumbnail');
            $thumbnailName = $file->getClientOriginalName();
            $file->move(public_path().'/images/',rand().$thumbnailName);
            $usaha->thumbnail = $thumbnailName;
        }
        $usaha->judul = $request->judul_usaha;
        $usaha->profil = $request->profil_usaha;
        $usaha->legalitas = $request->legalitas;
        $usaha->status_post = $request->status_post;
        $usaha->tanggal_post = $request->tanggal_post;
        $usaha->user_create = auth()->user()->id;
        $usaha->jenis_usaha = $request->kategori;
        $usaha->jenis_akad = $request->jenis_akad;
        $usaha->pemilik = $request->pemilik;
        $usaha->jenis_form = $request->jenis_form_bentuk;
        $usaha->status_dana = $request->status_dana;
        $usaha->kebutuhan_emas = $request->kebutuhan;
        $usaha->jangka_waktu = $request->jangka_waktu;
        $usaha->capaian_muqayyadah = $request->capaian;
        $usaha->save();
       
        return redirect()->route('admin.usaha_basis_emas');
    }
    public function usaha_basis_rupiah_page(Request $request){
        if($request->ajax()) {
            $data = Usaha::where('jenis_form','rupiah')->orWhere('kebutuhan_rupiah','!=',null)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('status_post', function($row){
                    if($row->status_post == "draf" || $row->status_post == "Draf"){
                        $btn = "<span class='badge badge-info-lighten'>Draf</span>";
                        return $btn;
                    }else if($row->status_post == "posting" || $row->status_post == "Posting") {
                        $btn = "<span class='badge badge-primary-lighten'>Posting</span>";
                        return $btn;
                    } else {
                        $btn = "<span class='badge badge-danger-lighten'>Cancel</span>";
                        return $btn;
                    } 
                })
                ->editColumn('status_dana', function($row){
                    if($row->status_dana){
                        $btn = "<span class='badge badge-success-lighten'>Aktif</span>";
                        return $btn;
                    } else {
                        $btn = "<span class='badge badge-danger-lighten'>Non Aktif</span>";
                        return $btn;
                    } 
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0);" data-id="'.$row->id.'" class="action-icon viewAkun"> <i class="mdi mdi-card-search-outline"></i></a>';
                    $btn = $btn.'<a href="usaha_basis_rupiah/'.$row->id.'/edit" class="action-icon editAkun"> <i class="mdi mdi-square-edit-outline"></i></a>';
                    return $btn;
                })
                ->rawColumns(['status_post','action','status_dana'])
                ->make(true);
        }
        return view('admin_view/daftar_usaha/usaha_basis_rupiah/index');
    }
    public function create_usaha_basis_rupiah_page(){
        return view('admin_view/daftar_usaha/usaha_basis_rupiah/create');
    }
    public function create_usaha_basis_rupiah(Request $request){
        if($request->hasfile('gallery')){
            foreach($request->file('gallery') as $image){
                $name = $image->getClientOriginalName();
                $image->move(public_path().'/images/',rand().$name);
                $data[] = $name;
            }
        }
        if($request->hasfile('proposal')){
            $file = $request->file('proposal');
            $proposalName = $file->getClientOriginalName();
            $file->move(public_path().'/proposal/',rand().$proposalName);
        }
        if($request->hasfile('thumbnail')){
            $file = $request->file('thumbnail');
            $thumbnailName = $file->getClientOriginalName();
            $file->move(public_path().'/images/',rand().$thumbnailName);
        }
        $usaha = new Usaha;
        $usaha->judul = $request->judul_usaha;
        $usaha->profil = $request->profil_usaha;
        $usaha->legalitas = $request->legalitas;
        $usaha->status_post = $request->status_post;
        $usaha->tanggal_post = $request->tanggal_post;
        $usaha->user_create = auth()->user()->id;
        $usaha->jenis_usaha = $request->kategori;
        $usaha->jenis_akad = $request->jenis_akad;
        $usaha->pemilik = $request->pemilik;
        $usaha->jenis_form = $request->jenis_form_bentuk;
        $usaha->status_dana = $request->status_dana;
        $usaha->kebutuhan_rupiah = $request->kebutuhan;
        $usaha->jangka_waktu = $request->jangka_waktu;
        $usaha->capaian_muqayyadah = $request->capaian;
        $usaha->proposal = $proposalName;
        $usaha->thumbnail = $thumbnailName;
        $usaha->save();
        // upload multiple image ke images usaha
        $images_usaha = new UsahaImages;
        $images_usaha->usaha_id = $usaha->id;
        $images_usaha->nama = \json_encode($data);
        $images_usaha->save();
        return redirect()->route('admin.usaha_basis_emas');
    }
    public function update_usaha_basis_rupiah(Request $request,$id){
        $usaha = Usaha::find($id);
        if($request->hasfile('gallery')){
            foreach($request->file('gallery') as $image){
                $name = $image->getClientOriginalName();
                $image->move(public_path().'/images/',rand().$name);
                $data[] = $name;
            }
            // upload multiple image ke images usaha
            $images_usaha = UsahaImages::where('usaha_id',$id)->first();
            $images_usaha->nama = \json_encode($data);
            $images_usaha->save();
        }
        if($request->hasfile('proposal')){
            $file = $request->file('proposal');
            $proposalName = $file->getClientOriginalName();
            $file->move(public_path().'/proposal/',rand().$proposalName);
            $usaha->proposal = $proposalName;

        }
        if($request->hasfile('thumbnail')){
            $file = $request->file('thumbnail');
            $thumbnailName = $file->getClientOriginalName();
            $file->move(public_path().'/images/',rand().$thumbnailName);
            $usaha->thumbnail = $thumbnailName;
        }
        $usaha->judul = $request->judul_usaha;
        $usaha->profil = $request->profil_usaha;
        $usaha->legalitas = $request->legalitas;
        $usaha->status_post = $request->status_post;
        $usaha->tanggal_post = $request->tanggal_post;
        $usaha->user_create = auth()->user()->id;
        $usaha->jenis_usaha = $request->kategori;
        $usaha->jenis_akad = $request->jenis_akad;
        $usaha->pemilik = $request->pemilik;
        $usaha->jenis_form = $request->jenis_form_bentuk;
        $usaha->status_dana = $request->status_dana;
        $usaha->kebutuhan_rupiah = $request->kebutuhan;
        $usaha->jangka_waktu = $request->jangka_waktu;
        $usaha->capaian_muqayyadah = $request->capaian;
        $usaha->save();
        return redirect()->route('admin.usaha_basis_rupiah');
    }
    public function edit_usaha_basis_rupiah_page($id){
        $usaha = Usaha::with('usahaImages')->find($id);
        return view('admin_view/daftar_usaha/usaha_basis_rupiah/create',compact('usaha'));
    }
    public function laporan_page(){
        return view('admin_view/daftar_usaha/laporan/index');
    }
}
