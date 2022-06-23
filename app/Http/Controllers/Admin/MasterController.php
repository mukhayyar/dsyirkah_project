<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Anggota;
use App\Models\Perwada;
use App\Models\ItemEmas;
use Illuminate\Http\Request;
use App\Imports\CIFAnggotaImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CIFAnggotaImportTest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MasterController extends Controller
{
    public function perwada_page(Request $request)
    {
        if($request->ajax()) {
            $data = Perwada::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function($row){
                    if($row->status == "Aktif"){
                        $btn = "<span class='badge badge-success-lighten'>Aktif</span>";
                        return $btn;
                    } else if($row->status == "Non Aktif"){
                        $btn = "<span class='badge badge-danger-lighten'>Non Aktif</span>";
                        return $btn;
                    } else {
                        $btn = "<span class='badge badge-warning-lighten'>Hold</span>";
                        return $btn;
                    }
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0);" data-id="'.$row->id.'" class="action-icon editPerwada" > <i class="mdi mdi-square-edit-outline"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return view('admin_view/master/perwada');
    }    

    public function perwada_add(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'kode' => ['required', 'string', 'max:5','unique:perwada'],
            'nama' => ['required', 'string', 'max:255'],
            'wilayah' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string'],
        ]);
        if($validation->fails()){
            return response()->json($validation->errors());
        }
        $perwada = new Perwada;
        $perwada->kode = $request->kode;
        $perwada->nama = $request->nama;
        $perwada->wilayah = $request->wilayah;
        $perwada->status = $request->status;
        $perwada->save();
        return response()->json(['success'=>'Data perwada berhasil ditambahkan']);
    }
    public function perwada_update(Request $request,$id)
    {
        $validation = Validator::make($request->all(), [
            'kode' => ['required', 'string', 'max:5'],
            'nama' => ['required', 'string', 'max:255'],
            'wilayah' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string'],
        ]);
        if($validation->fails()){
            return response()->json($validation->errors());
        }
        $perwada = Perwada::find($id);
        $perwada->kode = $request->kode;
        $perwada->nama = $request->nama;
        $perwada->wilayah = $request->wilayah;
        $perwada->status = $request->status;
        $perwada->save();
        return response()->json(['success'=>'Data perwada berhasil diupdate']);
    }
    public function perwada_edit($id)
    {
        $perwada = Perwada::find($id);
        return response()->json($perwada);
    }
    public function cif_anggota_page(Request $request)
    {
        if($request->ajax()) {
            $data = Anggota::with('user')->where([
                ['user_id','!=',null],
                ['no_ktp','!=',null],
            ])->latest()->get();
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
                    $btn = '<a href="javascript:void(0);" data-id="'.$row->nomor_ba.'" class="action-icon viewAkun" > <i class="mdi mdi-card-search-outline"></i></a>';
                    $btn = $btn.'<a href="javascript:void(0);" data-id="'.$row->nomor_ba.'" class="action-icon editAkun"> <i class="mdi mdi-square-edit-outline"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return view('admin_view/master/cif_anggota');
    }
    public function cif_anggota_cari($id){
        $anggota = Anggota::where([
            ['user_id','!=',null],
            ['nomor_ba','=',$id],
        ])->first(['nomor_ba','nama_lengkap','email','no_hp']);
        return response()->json($anggota);
    }
    public function cif_anggota_add(Request $request)
    {
        // dd($request->file('file_ktp'));
        $validation = Validator::make($request->all(), [
            'no_ba' => ['required', 'string', 'max:24'],
            'no_ktp' => ['required', 'string','min:16','max:16'],
            'jenis_kelamin' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'status_nikah' => ['required'],
            'alamat_ktp' => ['required'],
            'kelurahan_ktp' => ['required'],
            'kecamatan_ktp' => ['required'],
            'kota_ktp' => ['required'],
            'provinsi_ktp' => ['required'],
            'file_ktp' => ['required','max:2048'],
        ]);
        if($validation->fails()){
            return response()->json($validation->errors());
        }
        $anggota = Anggota::where('nomor_ba',$request->no_ba)->first();
        if($request->file('file_ktp')){
            $name = $request->file('file_ktp')->getClientOriginalName();
            $path = $request->file('file_ktp')->move(public_path().'/images/data_penting/ktp/',$name);
            $anggota->foto_ktp = $name;
            $anggota->lokasi_foto_ktp = $path;
        }
        $anggota->no_ktp = $request->no_ktp;
        $anggota->jenis_kelamin = $request->jenis_kelamin;
        $anggota->tempat_lahir = $request->tempat_lahir;
        $anggota->tanggal_lahir = $request->tanggal_lahir;
        $anggota->status_nikah = $request->status_nikah;
        $anggota->alamat_ktp = $request->alamat_ktp;
        $provinsi_ktp = explode(",",$request->provinsi_ktp);
        $kelurahan_ktp = explode(",",$request->kelurahan_ktp);
        $kecamatan_ktp = explode(",",$request->kecamatan_ktp);
        $kota_ktp = explode(",",$request->kota_ktp);
        $anggota->provinsi_ktp = $provinsi_ktp[1];
        $anggota->kelurahan_ktp = $kelurahan_ktp[1];
        $anggota->kecamatan_ktp = $kecamatan_ktp[1];
        $anggota->kota_ktp = $kota_ktp[1];
        $anggota->alamat_tinggal = $request->checkAlamatTinggal;
        $anggota->alamat_domisili = $request->alamat_dom;
        if($request->provinsi_domisili){
            $provinsi_domisili = explode(",",$request->provinsi_dom);
            $anggota->provinsi_domisili = $provinsi_domisili[1];
        }
        if($request->kecamatan_domisili){
            $kecamatan_domisili = explode(",",$request->kecamatan_dom);
            $anggota->kecamatan_domisili = $kecamatan_domisili[1];
        }
        if($request->kelurahan_domisili){
            $kelurahan_domisili = explode(",",$request->kelurahan_dom);
            $anggota->kelurahan_domisili = $kelurahan_domisili[1];
        }
        if($request->provinsi_domisili){
            $kota_domisili = explode(",",$request->kota_dom);
            $anggota->kota_domisili = $kota_domisili[1];
        }
        $anggota->save();
        return redirect()->back();
    }
    public function cif_anggota_edit($id){
        $anggota = Anggota::where([
            ['user_id','!=',null],
            ['nomor_ba','=',$id],
        ])->first();
        return response()->json($anggota);
    }    
    public function cif_anggota_update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'no_ba' => ['required', 'string', 'max:24'],
            'no_ktp' => ['required', 'string','min:16','max:16'],
            'jenis_kelamin' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'status_nikah' => ['required'],
            'alamat_ktp' => ['required'],
            'kelurahan_ktp' => ['required'],
            'kecamatan_ktp' => ['required'],
            'kota_ktp' => ['required'],
            'provinsi_ktp' => ['required'],
        ]);
        if($validation->fails()){
            return response()->json($validation->errors());
        }
        $anggota = Anggota::where('nomor_ba',$request->no_ba)->first();
        if($request->file('file_ktp')){
            $name = $request->file('file_ktp')->getClientOriginalName();
            $path = $request->file('file_ktp')->move(public_path().'/images/data_penting/ktp/',$name);
            $anggota->foto_ktp = $name;
            $anggota->lokasi_foto_ktp = $path;
        }
        $anggota->no_ktp = $request->no_ktp;
        $anggota->jenis_kelamin = $request->jenis_kelamin;
        $anggota->tempat_lahir = $request->tempat_lahir;
        $anggota->tanggal_lahir = $request->tanggal_lahir;
        $anggota->status_nikah = $request->status_nikah;
        $anggota->alamat_ktp = $request->alamat_ktp;
        if($request->provinsi_ktp){
            $provinsi_ktp = explode(",",$request->provinsi_ktp);
            $anggota->provinsi_ktp = $provinsi_ktp[1];
        }
        if($request->provinsi_ktp){
            $kelurahan_ktp = explode(",",$request->kelurahan_ktp);
            $anggota->kelurahan_ktp = $kelurahan_ktp[1];
        }
        if($request->provinsi_ktp){
            $kecamatan_ktp = explode(",",$request->kecamatan_ktp);
            $anggota->kecamatan_ktp = $kecamatan_ktp[1];
        }
        if($request->provinsi_ktp){
            $kota_ktp = explode(",",$request->kota_ktp);
            $anggota->kota_ktp = $kota_ktp[1];
        }
        $anggota->alamat_tinggal = $request->checkAlamatTinggal;
        $anggota->alamat_domisili = $request->alamat_dom;
        if($request->provinsi_domisili){
            $provinsi_domisili = explode(",",$request->provinsi_dom);
            $anggota->provinsi_domisili = $provinsi_domisili[1];
        }
        if($request->kecamatan_domisili){
            $kecamatan_domisili = explode(",",$request->kecamatan_dom);
            $anggota->kecamatan_domisili = $kecamatan_domisili[1];
        }
        if($request->kelurahan_domisili){
            $kelurahan_domisili = explode(",",$request->kelurahan_dom);
            $anggota->kelurahan_domisili = $kelurahan_domisili[1];
        }
        if($request->provinsi_domisili){
            $kota_domisili = explode(",",$request->kota_dom);
            $anggota->kota_domisili = $kota_domisili[1];
        }
        $anggota->save();
        return redirect()->back();
    }
    public function cif_anggota_import(Request $request)
    {
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_excel',$nama_file);
		// import data
		Excel::import(new CIFAnggotaImport, public_path('/file_excel/'.$nama_file));
        File::delete(public_path('/file_excel/'.$nama_file));
		// notifikasi dengan session
		Session::flash('sukses','Data Anggota Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect()->back();
    }
    public function konten_wa_page()
    {
        return view('admin_view/master/');
    }    
    public function list_keterangan_page()
    {
        return view('admin_view/master/');
    }    
    public function item_emas_page(Request $request)
    {
        if($request->ajax()) {
            $data = ItemEmas::all();
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
                    $btn = '<a href="javascript:void(0);" data-id="'.$row->id.'" class="action-icon editEmas" > <i class="mdi mdi-square-edit-outline"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return view('admin_view/master/item_emas');
    }   
    public function item_emas_add(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'nama_emas' => ['required', 'string', 'max:255'],
            'jenis_emas' => ['required', 'string', 'max:255'],
            'gramasi' => ['required', 'string', 'max:255'],
            'status' => ['required', 'boolean'],
        ]);
        if($validation->fails()){
            return response()->json($validation->errors());
        }
        $emas = new ItemEmas;
        $emas->nama = $request->nama_emas;
        $emas->jenis = $request->jenis_emas;
        $emas->gramasi = $request->gramasi;
        $emas->status = $request->status;
        $emas->save();
        return response()->json(['success'=>'Data emas berhasil ditambahkan']);
    }
    public function item_emas_update(Request $request,$id)
    {
        $validation = Validator::make($request->all(), [
            'nama_emas' => ['required', 'string', 'max:255'],
            'jenis_emas' => ['required', 'string', 'max:255'],
            'gramasi' => ['required', 'string', 'max:255'],
            'status' => ['required', 'boolean'],
        ]);
        if($validation->fails()){
            return response()->json($validation->errors());
        }
        $emas = ItemEmas::find($id);
        $emas->nama = $request->nama_emas;
        $emas->jenis = $request->jenis_emas;
        $emas->gramasi = $request->gramasi;
        $emas->status = $request->status;
        $emas->save();
        return response()->json(['success'=>'Data emas berhasil diupdate']);
    }
    public function item_emas_edit($id)
    {
        $emas = ItemEmas::find($id);
        return response()->json($emas);
    } 
}
