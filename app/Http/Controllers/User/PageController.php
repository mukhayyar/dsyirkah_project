<?php

namespace App\Http\Controllers\User;

use DataTables;
use App\Models\Usaha;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    //

    public function muqayyadah()
    {
        $usaha = Usaha::where('jenis_akad','muqayyadah')->latest()->paginate(3);
        return view('main_view/muqayyadah',compact('usaha')); 
    }
    
    public function mutlaqah(Request $request)
    {
        if($request->ajax()) {
            $data = Usaha::where('jenis_akad','mutlaqah')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('kebutuhan', function($row){
                    if(isset($row->kebutuhan_emas)){
                        return $row->kebutuhan_emas;
                    } else {
                        return $row->kebutuhan_rupiah;
                    }
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#modal-editakun-admin"> <i class="mdi mdi-file-pdf-box"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','capaian'])
                ->make(true);
        }
        $usaha = Usaha::where('jenis_akad','mutlaqah')->latest()->paginate(3);
        return view('main_view/mutlaqah',compact('usaha'));
    }
    public function detail_usaha_mutlaqah($id)
    {
        $usaha = Usaha::find($id);
        return view('main_view/detail_mutlaqah',compact('usaha'));
    }
}
