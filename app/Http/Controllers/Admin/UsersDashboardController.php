<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\User;
use App\Models\Admin;
use App\Models\Perwada;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersDashboardController extends Controller
{
    public function ganti_sandi_page(Request $request)
    {
        return view('admin_view/users_dashboard/ganti_sandi');
    }
    
    public function ganti_sandi(Request $request)
    {
        $user_auth = Auth::user()->id;
        $data = User::find($user_auth);
        if($request->password == $request->password_confirm){
            if($request->password == $request->old_password){
                return redirect()->route('ganti_sandi_page')->with('alert','Password baru sama dengan password lama');
            } else {
                if(Hash::check($request->old_password, $data->password)){
                    $data->password = Hash::make($request->password_confirm);
                    $data->save();
                    return redirect()->route('ganti_sandi_page')->with('success','Password berhasil diganti');
                } else {
                    return redirect()->route('ganti_sandi_page')->with('alert','Salah memasukkan password lama');
                }
            }
        }
        else {
            return redirect()->route('ganti_sandi_page')->with('alert','Konfirmasi password salah');
        }
    }
    
    public function pengaturan_akun_page(Request $request)
    {
        // $data = Admin::latest()->get();
        if($request->ajax()) {
            $data = Admin::with('user')->latest()->get();
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
                    $btn = '<a href="javascript:void(0);" data-id="'.$row->id.'" class="action-icon editUser"> <i class="mdi mdi-square-edit-outline"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        $perwada = Perwada::where('status','Aktif')->get();
        return view('admin_view/users_dashboard/pengaturan_akun',compact('perwada'));
    }

    public function pengaturan_akun(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'fullName' => ['required', 'string', 'max:255'],
            'userName' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'max:255'],
            'kantor' => ['required', 'string', 'max:255'],
            'grup' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'status' => ['required', 'boolean'],
        ]);
        if($validation->fails()){
            return response()->json(['error'=>'Data admin gagal ditambahkan']);
        }
        $userAdministrator = new User;
        $userAdministrator->name = $request->fullName;
        $userAdministrator->email = $request->email;
        $userAdministrator->password = Hash::make($request->password);
        $userAdministrator->role = $request->grup;
        $userAdministrator->status = $request->status;
        $userAdministrator->save();
        
        $administratorProfile = Admin::create([
            'user_id' => $userAdministrator->id,
            'nama_karyawan' => $request->fullName,
            'user_name' => $request->userName,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'kantor' => $request->kantor,
            'status' => $request->status
        ]);
        return response()->json(['success'=>'Data admin berhasil ditambahkan']);
    }
    public function pengaturan_akun_edit($id)
    {
        $anggota = Admin::with('user')->find($id);
        return response()->json($anggota);
    }
    public function pengaturan_akun_update(Request $request,$id)
    {
        $admin = Admin::find($id);
        $userAdministrator = User::find($admin->user_id);
        $userAdministrator->name = $request->fullName;
        $userAdministrator->email = $request->email;
        $userAdministrator->password = Hash::make($request->password);
        $userAdministrator->role = $request->grup;
        $userAdministrator->status = $request->status;
        $userAdministrator->save();
        
        $administratorProfile = Admin::where('id',$id)->first();
        $administratorProfile->nama_karyawan = $request->fullName;
        $administratorProfile->user_name = $request->userName;
        $administratorProfile->email = $request->email;
        $administratorProfile->jabatan = $request->jabatan;
        $administratorProfile->kantor = $request->kantor;
        $administratorProfile->status = $request->status;
        $administratorProfile->save();
        return response()->json(['success'=>'Data berhasil ditambahkan'],201);
    }
}
