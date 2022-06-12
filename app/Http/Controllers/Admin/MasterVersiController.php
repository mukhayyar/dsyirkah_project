<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\VersiProduk;
use App\Models\NisbahVersiProduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class MasterVersiController extends Controller
{
    public function muqayyadah_emas_index(Request $request)
    {
        if($request->ajax()) {
            $data = VersiProduk::where([
                ['jenis','=','Muqayyadah'],
                ['item','=','emas']
            ])->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function($row){
                    if($row->status){
                        $btn = "<span class='badge badge-success-lighten'>Aktif</span>";
                        return $btn;
                    } else {
                        $btn = "<span class='badge badge-danger-lighten'>Non Aktif</span>";
                        return $btn;
                    }
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0);" data-id="'.$row->id.'" class="action-icon editVersi" > <i class="mdi mdi-square-edit-outline"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return view('admin_view/master/versi_dsyirkah/muqayyadah/emas/index');
    }
    public function versi_edit($id){
        $versi = VersiProduk::with('nisbah_versi_produk_syirkah')->find($id);
        return response()->json($versi);
    }
    public function versi_update(Request $request,$id){
        $versi = VersiProduk::with('nisbah_versi_produk_syirkah')->find($id);
        $versi->versi;
        $versi->save();
        $bulan = $request->bulan;
        $nisbah = $request->nisbah;
        $versi_nisbah = $versi->nisbah_versi_produk_syirkah;
        for($i = 0; $i < count($versi_nisbah); $i++){
            $update_versi_nisbah = NisbahVersiProduk::find($versi_nisbah[$i]->id);
            $update_versi_nisbah->bulan = $bulan[$i];
            $update_versi_nisbah->nisbah = $nisbah[$i];
            $update_versi_nisbah->save();
        }
        return response()->json($update_versi_nisbah);
    }
    public function muqayyadah_rupiah_index(Request $request)
    {
        if($request->ajax()) {
            $data = VersiProduk::where([
                ['jenis','=','Muqayyadah'],
                ['item','=','rupiah']
            ])->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function($row){
                    if($row->status){
                        $btn = "<span class='badge badge-success-lighten'>Aktif</span>";
                        return $btn;
                    } else {
                        $btn = "<span class='badge badge-danger-lighten'>Non Aktif</span>";
                        return $btn;
                    }
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0);" data-id="'.$row->id.'" class="action-icon editVersi" > <i class="mdi mdi-square-edit-outline"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return view('admin_view/master/versi_dsyirkah/muqayyadah/rupiah/index');
    }  
    public function mutlaqah_emas_index(Request $request)
    {
        if($request->ajax()) {
            $data = VersiProduk::where([
                ['jenis','=','Mutlaqah'],
                ['item','=','emas']
            ])->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function($row){
                    if($row->status){
                        $btn = "<span class='badge badge-success-lighten'>Aktif</span>";
                        return $btn;
                    } else {
                        $btn = "<span class='badge badge-danger-lighten'>Non Aktif</span>";
                        return $btn;
                    }
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0);" data-id="'.$row->id.'" class="action-icon editVersi" > <i class="mdi mdi-square-edit-outline"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return view('admin_view/master/versi_dsyirkah/mutlaqah/emas/index');
    }  
    public function mutlaqah_rupiah_index(Request $request)
    {
        if($request->ajax()) {
            $data = VersiProduk::where([
                ['jenis','=','Mutlaqah'],
                ['item','=','rupiah']
            ])->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function($row){
                    if($row->status){
                        $btn = "<span class='badge badge-success-lighten'>Aktif</span>";
                        return $btn;
                    } else {
                        $btn = "<span class='badge badge-danger-lighten'>Non Aktif</span>";
                        return $btn;
                    }
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0);" data-id="'.$row->id.'" class="action-icon editVersi" > <i class="mdi mdi-square-edit-outline"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return view('admin_view/master/versi_dsyirkah/mutlaqah/rupiah/index');
    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'jenis' => ['required', 'string'],
            'item' => ['required', 'string', 'max:255'],
            'versi' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string'],
        ]);
        if($validation->fails()){
            return response()->json($validation->errors());
        }
        if($request->status == 1){
            VersiProduk::where([
                ['jenis','=',$request->jenis],
                ['item','=',$request->item],
                ['status','=',1]
            ])->update(['status'=>0]);
        }
        $versi = new VersiProduk;
        $versi->jenis = $request->jenis;
        $versi->versi = $request->versi;
        $versi->item = $request->item;
        $versi->status = $request->status;
        $versi->save();
        $bulan = $request->bulan;
        $nisbah = $request->nisbah;
        for($i = 0; $i < count($bulan); $i++){
            $nisbah_versi = new NisbahVersiProduk;
            $nisbah_versi->versi_id = $versi->id;
            $nisbah_versi->bulan = $bulan[$i];
            $nisbah_versi->nisbah = $nisbah[$i];
            $nisbah_versi->save();
        }
        return response()->json(['success'=>'Data versi berhasil ditambahkan']);
    }
    public function update(Request $request,$id)
    {
        $validation = Validator::make($request->all(), [
            'kode' => ['required', 'string'],
            'nama' => ['required', 'string', 'max:255'],
            'wilayah' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string'],
        ]);
        if($validation->fails()){
            return response()->json($validation->errors());
        }
        $perwada = VersiProduk::find($id);
        $perwada->kode = $request->kode;
        $perwada->nama = $request->nama;
        $perwada->wilayah = $request->wilayah;
        $perwada->status = $request->status;
        $perwada->save();
        return response()->json(['success'=>'Data perwada berhasil diupdate']);
    }
    public function edit($id)
    {
        $perwada = VersiProduk::find($id);
        return response()->json($perwada);
    }    
}
