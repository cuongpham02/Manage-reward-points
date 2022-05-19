<?php

namespace App\Http\Controllers\Admin;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::paginate(config('constant.paginatedepartment'));
        return view('backend.departments.index',compact('departments'));
    }
    public function create()
    {
        return view('backend.departments.create');
    }
    public function store(CreateDepartmentRequest $request)
    {
        $data = $request->all();
        Department::create($data);
        return redirect()->route('admin.department.index')->with('message','Add a new Department of Success')
    }
    public function show($id)
    {
        $department = Department::findOrFail($id);
        return view('backend.departments.show',compact('department'));
    }
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('backend.departments.edit',compact('department'));
    }
    public function updata(EditDepartmentRequest $request)
    {
        $department = Department::findOrFail($id);
        $data = $request->all();
        $department->update($data);
        return redirect()->route('admin.department.index')->with('message','Successfully updated the Department')
    }
    // Destroy is used by id, Delete is used by where condition
    public destroy()
    {
        $department = Department::findOrFail($id);
        if ($department->staffs->exists()) {
            $department->destroy();
            return redirect()->back()->with('message','Delete department successfully');
        } else {
            return redirect()->back()->with('message','This Department cannot be deleted, You need to delete this department employee first');
        }
    }
    public function changStatus(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        $category = Category::findOrFail($id);
        if ($category) {
          $category->status = $status;
          $category->save();
          return redirect()->back()->with('message','Status change successful');
        }
    }
    public function listSoftDeletes()
    {
        $softDeleteDepartments = Department::onlyTrashed();
        return view('backend.departments.list_softdeletes',compact('softDeleteDepartments'));
    }
    public function restore($id)
    {
        $softDeleteDepartment = Department::onlyTrashed()->findOrFail($id);
        $softDeleteDepartment->restore();
        return redirect()->route('admin.department.index')->with('message','Successfully restored the Department');
    }
    public function forceDelete($id)
    {
        $softDeleteDepartment = Department::onlyTrashed()->findOrFail($id);
        $softDeleteDepartment->forceDelete();
        return redirect()->back()->with('message','Permanently delete Department successfully');
    }
}
