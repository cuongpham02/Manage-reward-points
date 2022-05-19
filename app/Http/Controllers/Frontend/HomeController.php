<?php

namespace App\Http\Controllers\Frontend;
use DB;
use Session;
use Carbon\Carbon;
use App\Models\Staff;
use App\Models\Point;
use App\Point_Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $month=Carbon::now()->month;
            $staffs = DB::table('staffs')
                ->select(DB::raw('staffs.*,SUM(points.number_point) as tong'))
                ->leftjoin('point__staff' , 'staffs.id', '=', 'point__staff.staff_id')
                ->leftjoin('points' , 'points.id', '=', 'point__staff.point_id')
                ->whereMonth('date',$month)
                ->groupBy('staffs.id')
                ->get();
            // dd($staffs);    
        return view('frontend.home.index')->with(compact('staffs','month'));
    }
    public function detail($id){
            $month=Carbon::now()->month;
            $staff=Staff::where('id',$id)->first();
            $points=DB::table('point__staff')
                ->join('staffs' , 'staffs.id', '=', 'point__staff.staff_id')
                ->join('points' , 'points.id', '=', 'point__staff.point_id')
                ->where('staffs.id','=',$id)
                ->whereMonth('date',$month)
                ->orderBy('point__staff.date','DESC')
                ->get();     
        return view('frontend.home.detail')->with(compact('staff','points'));
    }
    public function search(Request $id,$month){
        $staffs = DB::table('staffs')
                ->select(DB::raw('staffs.*,SUM(points.number_point) as tong'))
                ->leftjoin('point__staff' , 'staffs.id', '=', 'point__staff.staff_id')
                ->leftjoin('points' , 'points.id', '=', 'point__staff.point_id')
                ->where('staff.id','=',$id)
                ->whereMonth('date',$month)
                ->groupBy('staffs.id')
                ->get();
    }
}
