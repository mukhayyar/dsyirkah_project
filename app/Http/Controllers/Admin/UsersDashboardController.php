<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UsersDashboardController extends Controller
{
    public function ganti_sandi_page(Request $request)
    {
        return view('admin_view/users_dashboard/ganti_sandi');
    }
    
    public function ganti_sandi()
    {
        return 1;
    }
    
    public function pengaturan_akun_page(Request $request)
    {
        // $data = Admin::latest()->get();
        // dd($data);
        if($request->ajax()) {
            $data = Admin::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editCustomer">Edit</a>';
                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteCustomer">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin_view/users_dashboard/pengaturan_akun');
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

        return $validation;
    }
}
