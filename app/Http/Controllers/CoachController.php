<?php

namespace App\Http\Controllers;

use App\Http\Resources\CoachResource;
use App\Models\Coach;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CoachController extends Controller
{
    
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Coach::with('gym')->get();
            return Datatables::of($data)->addIndexColumn()
                    ->addColumn('action', function($row){
                         
                            $Btn='<a href="javascript:void(0)" class="view btn btn-primary btn-sm mr-3"> <i class="fas fa-folder mr-2"> </i>View</a>';
                            $Btn .= '<a href="javascript:void(0)" class="edit btn btn-info btn-sm mr-3 text-white"> <i class="fas fa-pencil-alt mr-2"> </i>Edit</a>';
                            $Btn .='<a href="javascript:void(0)" class="delete btn btn-danger btn-sm mr-3"><i class="fas fa-trash mr-2"> </i>Delete</a>';
                            return $Btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('menu.coaches');
    }

}
