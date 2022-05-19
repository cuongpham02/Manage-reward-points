<?php

namespace App\Http\Controllers\Admin;
use DB;
use Session;
use Carbon\Carbon;
use App\Models\Staff;
use App\Models\Department;
use App\Models\Point;
use App\Point_Staff;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\EditStaffRequest;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    public function index(){
        $month=Carbon::now()->month;

        // DB::enableQueryLog();
            $staffs = DB::table('staffs')
                ->select(DB::raw('staffs.*,SUM(points.number_point) as tong'))
                ->leftjoin('point_staff' , 'staffs.id', '=', 'point_staff.staff_id')
                ->leftjoin('points' , 'points.id', '=', 'point_staff.point_id')
                ->groupBy('staffs.id')
                ->paginate(config('paginatestaff'));
        return view('backend.staff.show_staff')->with(compact('staffs','month'));
    }
    public function showsDetailStaffWithPoint($id){
        $staff=Staff::with('points')->findOrfail($id);
        return view('backend.staff.detail_points_staff',compact('staff'));
    }
    public function create(){
        return view('backend.staff.new_staff');
    }
    public function store_staff(StoreStaffRequest $request){
        $data=$request->except(['_token','add_staff']);
        Staff::insert($data);
        return Redirect(route('show-all-staff'))->with('message','Add thành công');;
    }
    public function edit_staff($id){
        $staff=Staff::findOrfail($id);
        return view('backend.staff.edit_staff',compact('staff'));
    }
    public function update_staff(EditStaffRequest $request,$id){
        $staff=Staff::findOrfail($id);
        $data=$request->all();
        $staff->update($data);
        return Redirect()->route('show-all-staff')->with('message','Update thành công');;
    }

    public function showChooseBonusPointsForStaff($id){
            $staff=Staff::findOrfail($id);
            $points=Point::orderBy('number_point','desc')->get();
            $date=Carbon::now()->toDateString();
        return view('backend.staff.bonus_point',compact('staff','points','date'));
    }
    public function savePointOfStaff(Request $request,$id){
        $this->validate($request,[
                'point_id'=>'required',
            ],
            [
                'point_id.required' => 'Chưa chọn tiêu chí điểm',
            ]);

        $list=$request->point_id;
        $date=$request->date;
        $staff=Staff::findOrfail($id);
        $data=[];
        foreach($list as $key => $value){
                    $data[] = [
                        'point_id' => $value,
                        'staff_id' => $id,
                        'date' => $date
                    ];
                }
        try {
            DB::beginTransaction();
            Point_Staff::insert($data);
            DB::commit();
            
        } catch (\Exception $exception) {
            DB::rollBack();
        }

        return Redirect(route('show-all-staff'))->with('message','Thành công');
    }

    public function destroy_staff($id){
        $staffId=Staff::findOrfail($id);
        try {
            DB::beginTransaction();
            $staffId=Staff::findOrfail($id);
            if($staffId){
               $staffId->points()->detach();
                $staffId->forceDelete();
            }
            DB::commit();
            return redirect()->back()->with('message','Xóa NV thành công');
        } catch (\Exception $exception) {
                DB::rollBack();
        }
    }
    public function deletePointOnStaff($id){
        $point_staffID=Point_Staff::findOrfail($id);
        $point_staffID->delete();
        return redirect()->back()->with('message','Xóa thành công');
    }
}
