<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\User;
use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Imports\AnggotaImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UsersAnggotaController extends Controller
{
    public function data_verifikasi_akun_page(Request $request)
    {
        if($request->ajax()) {
            $data = Anggota::latest()->get();
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
                    $btn = '<a href="javascript:void(0);" data-id="'.$row->nomor_ba.'" class="action-icon editAkun"> <i class="mdi mdi-square-edit-outline"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return view('admin_view/users_anggota/data_verifikasi_akun');
    }
    public function data_verifikasi_akun_edit($id)
    {
        $anggota = Anggota::where('nomor_ba','=',$id)->first(['nomor_ba','nama_lengkap','email','no_hp','status']);
        return response()->json($anggota);
    }
    public function data_verifikasi_akun_add(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'no_ba' => ['required', 'string', 'max:24'],
            'nama' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:16'],
            'email' => ['required', 'email', 'unique:anggota'],
            'status' => ['required', 'string'],
        ]);
        if($validation->fails()){
            return response()->json(['error'=>'Data admin gagal ditambahkan']);
        }
        $anggota = new Anggota;
        $anggota->nomor_ba = $request->no_ba;
        $anggota->nama_lengkap = $request->nama;
        $anggota->no_hp = $request->no_hp;
        $anggota->email = $request->email;
        $anggota->status = $request->status;
        $anggota->save();
        return response()->json(['success'=>'Data data verifikasi akun berhasil ditambahkan']);
    }
    public function data_verifikasi_akun_update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'no_ba' => ['required', 'string', 'max:24'],
            'nama' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:16'],
            'email' => ['required', 'email'],
            'status' => ['required', 'string'],
        ]);
        if($validation->fails()){
            return response()->json($validation->errors());
        }
        $anggota = Anggota::where('nomor_ba',$id)->first();
        $anggota->nomor_ba = $request->no_ba;
        $anggota->nama_lengkap = $request->nama;
        $anggota->no_hp = $request->no_hp;
        $anggota->email = $request->email;
        $anggota->status = $request->status;
        $anggota->save();
        return response()->json(['success'=>'Data data verifikasi akun berhasil diupdate']);
    }
    public function pengaturan_akun_page(Request $request)
    {
        if($request->ajax()) {
            $data = Anggota::with('user')->where('user_id','!=',null)->latest()->get();
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
                ->addColumn('reset_sandi', function($row){
                    $btn = '<a href="javascript:void(0);" id="reset-password" class="action-icon reset-password" data-email="'.$row->email.'"> <i class="mdi mdi-email-fast"></i></a>';
                    return $btn;
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0);" data-id="'.$row->nomor_ba.'" class="action-icon viewAkun"> <i class="mdi mdi-card-search-outline"></i></a>';
                    $btn = $btn.'<a href="javascript:void(0);" data-id="'.$row->nomor_ba.'" class="action-icon editAkun"> <i class="mdi mdi-square-edit-outline"></i></a>';
                    return $btn;
                })
                ->rawColumns(['reset_sandi','action','status'])
                ->make(true);
        }
        return view('admin_view/users_anggota/pengaturan_akun');
    }
    public function data_verifikasi_akun_import(Request $request)
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
		Excel::import(new AnggotaImport, public_path('/file_excel/'.$nama_file));
        File::delete(public_path('/file_excel/'.$nama_file));
		// notifikasi dengan session
		Session::flash('sukses','Data Anggota Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect()->back();
    }
    public function pengaturan_akun_cari($id){
        $anggota = Anggota::where([
            ['user_id','=',null],
            ['nomor_ba','=',$id],
        ])->first(['nomor_ba','nama_lengkap','email','no_hp']);
        return response()->json($anggota);
    }
    public function pengaturan_akun_edit($id)
    {
        $anggota = Anggota::where([
            ['user_id','!=',null],
            ['nomor_ba','=',$id],
        ])->first(['nomor_ba','nama_lengkap','email','no_hp','status']);
        return response()->json($anggota);
    }
    public function pengaturan_akun_add(Request $request){
        $validation = Validator::make($request->all(), [
            'nomor_ba' => ['required', 'string', 'max:255'],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'status' => ['required', 'boolean'],
            'password' => ['required', 'string','min:8', 'confirmed'],
        ]);
        if($validation->fails()){
            return response()->json(['error'=>'Data admin gagal ditambahkan']);
        }
        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'User';
        $user->status = $request->status;
        $user->save();
        $anggota = Anggota::where('nomor_ba',$request->nomor_ba)->first();
        $anggota->user_id = $user->id;
        $anggota->status = $request->status;
        $anggota->save();
        return response()->json(['success'=>'Data data verifikasi akun berhasil ditambahkan']);
    }
    public function pengaturan_akun_update(Request $request,$id){
        $validation = Validator::make($request->all(), [
            'password' => ['required', 'string','min:8', 'confirmed'],
        ]);
        if($validation->fails()){
            return response()->json($validation->errors());
        }
        $anggota = Anggota::where('nomor_ba',$request->nomor_ba)->first();
        $user = User::find($anggota->user_id);
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success'=>'Data data verifikasi akun berhasil diupdate']);
    }
}
