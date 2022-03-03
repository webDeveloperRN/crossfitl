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
                           $Btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-xl mr-3">Edit</a>';
                            $Btn=$Btn.'<a href="javascript:void(0)" class="delete btn btn-danger btn-xl mr-3">Delete</a>';
                            $Btn=$Btn.'<a href="javascript:void(0)" class="view btn btn-primary btn-xl mr-3">View</a>';
                            return $Btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('menu.coaches');
    }

}
