<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Carbon\Carbon;
use App\Staff;
use App\Point;
use App\Point_Staff;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStaffRequest;
use Illuminate\Support\Facades\Redirect;

class StaffController extends Controller
{
    public function index(){
        $month=Carbon::now()->month;

        // DB::enableQueryLog();
            $staffs = DB::table('staffs')
                ->select(DB::raw('staffs.*,SUM(points.number_point) as tong'))
                ->leftjoin('point__staff' , 'staffs.id', '=', 'point__staff.staff_id')
                ->leftjoin('points' , 'points.id', '=', 'point__staff.point_id')
                ->groupBy('staffs.id')
                ->get();
        // dd(DB::enableQueryLog());
            // dd($staffs);
        return view('backend.staff.show_staff')->with(compact('staffs','month'));
    }
    public function staff_detail($id){
        $staff=Staff::where('id',$id)->first();
        $points=DB::table('point__staff')
                ->select(DB::raw('point__staff.*,points.desc,points.number_point'))
                ->join('staffs' , 'staffs.id', '=', 'point__staff.staff_id')
                ->join('points' , 'points.id', '=', 'point__staff.point_id')
                ->where('staffs.id','=',$id)
                ->orderBy('point__staff.date','DESC')
                ->paginate(20);  
        return view('backend.staff.detail_points_staff',compact('staff','points'));
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
    public function update_staff(Request $request,$id){
        $staff=Staff::findOrfail($id);
        $get_email=$staff->email;
        $email=$request->email;
        if ($email==$get_email ) {
            $data=$request->all();
        } else {
                $this->validate($request,[
                'name'=>'required|max:100|min:3',
                'birthday' => 'required',
                'email'=>'required|email|unique:staffs,email|max:100',
                'phone' => 'required|numeric|digits:10',
            ],
            [
                'name.required' => 'Bạn chưa nhập tên thành viên',
                'email.required' => 'Bạn chưa nhập email',
                'birthday.required' => 'Bạn chưa nhập ngày sinh',
                'email.unique' => 'Email này đã tồn tại',
                'phone.numeric' => 'SDT là số',
                'phone.required' => 'Nhập số điện thoại',
                'phone.digits' => 'Nhập đúng số điện thoại 10 số',
                'password.required' => 'Bạn chưa nhập Mật khẩu',
            ]);
            $data=$request->all();
        }
        $staff->update($data);
        return Redirect(route('show-all-staff'))->with('message','Update thành công');;
    }

//Cộng hoặc Trừ điểm thưởng;
    public function bonus_points($id){
            $staff=Staff::findOrfail($id);
            $points=Point::orderBy('number_point','desc')->get();
            $date=Carbon::now()->toDateString();
        return view('backend.staff.bonus_point',compact('staff','points','date'));
    }
    public function save_bonus(Request $request,$id){
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

//Xóa và gỡ nhân viên ra khỏi bảng staff_point
    public function destroy_staff($id){
        $staff=Staff::findOrfail($id);
        try {
            DB::beginTransaction();
            $staff=Staff::findOrfail($id);
            if($staff){
               $staff->points()->detach();
                $staff->forceDelete();
            }
            DB::commit();
            return redirect()->back()->with('message','Xóa NV thành công');
        } catch (\Exception $exception) {
                DB::rollBack();
        }
    }
    public function delete_detail($id){
        $detail=Point_Staff::findOrfail($id);
        $detail->delete();
        return redirect()->back()->with('message','Xóa thành công');
    }

}
