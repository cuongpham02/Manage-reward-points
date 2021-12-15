<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Carbon\Carbon;
use App\Staff;
use App\Point;
use App\Point_Staff;
use Illuminate\Http\Request;
use App\Http\Requests\StorePointRequest;
use Illuminate\Support\Facades\Redirect;

class PointController extends Controller
{
    
    public function index()
    {
        $points=Point::orderBy('number_point','desc')->paginate(10);
           return view('backend.poits.show',compact('points'));
    }
    public function create()
    {
        return view('backend.poits.new');
    }

    public function store(StorePointRequest $request)
    {
        $data=$request->except(['_token','add_points']);
        Point::insert($data);
        return Redirect(route('show-poits'));

    }
    public function edit($id)
    {
        $point=Point::findOrfail($id);
        return view('backend.poits.edit',compact('point'));
    }
    public function update(Request $request, $id)
    {
        $point=Point::findOrfail($id);
        $get_desc=$point->desc;
        if ($request->desc==$get_desc) {
            $this->validate($request,[
               'desc'=>'required|max:100|min:3',
                'number_point' => 'required|numeric|between:-10,10',
            ],
            [
                'desc.required' => 'Bạn chưa nhập tên sản phẩm',
                'number_point.between' => 'Điểm từ -10->10',
                'number_point.required' => 'Bạn chưa nhập điểm',
                'number_point' => 'Nhập số',
            ]);
        } else {
            $this->validate($request,[
               'desc'=>'required|max:100|unique:points,desc|min:3',
                'number_point' => 'required|numeric|between:-10,10',
            ],
            [
                'desc.required' => 'Bạn chưa nhập tên sản phẩm',
                'desc.unique' => 'Tiêu chí này đã tồn tại',
                'number_point.between' => 'Điểm từ -10->10',
                'number_point.required' => 'Bạn chưa nhập điểm',
                'number_point' => 'Nhập số',
            ]);
        }
        $data=$request->except(['_token','add_points']);
        $point->update($data);
        return Redirect(route('show-poits'));
    }
    public function destroy($id)
    {
        // dd($point);
        try {
            DB::beginTransaction();
            $point=Point::findOrfail($id);
            if($point){
               $point->staffs()->detach();
                $point->forceDelete();
            }
            DB::commit();
            return redirect()->back()->with('message','Xóa tiêu chí thành công');
        } catch (\Exception $exception) {
                DB::rollBack();
        }
    }
}
