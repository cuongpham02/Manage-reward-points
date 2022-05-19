<?php

namespace App\Http\Controllers\Admin;
use DB;
use Session;
use Carbon\Carbon;
use App\Models\Staff;
use App\Models\Point;
use App\Point_Staff;
use Illuminate\Http\Request;
use App\Http\Requests\StorePointRequest;
use App\Http\Requests\EditPointRequest;
use App\Http\Controllers\Controller;

class PointController extends Controller
{
    public function index()
    {
        $points=Point::orderBy('number_point','desc')->paginate(config('constant.paginatepoint'));
           return view('backend.poits.show',compact('points'));
    }
    public function create()
    {
        return view('backend.poits.new');
    }

    public function store(StorePointRequest $request)
    {
        $data=$request->except(['_token','add_points']);
        Point::create($data);
        return Redirect(route('show-poits'));

    }
    public function edit($id)
    {
        $point=Point::findOrfail($id);
        return view('backend.poits.edit',compact('point'));
    }
    public function update(EditPointRequest $request, $id)
    {
        $point=Point::findOrfail($id);
        $data=$request->all();
        $point->update($data);
        return Redirect(route('show-poits'));
    }
    public function destroy($id)
    {
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
