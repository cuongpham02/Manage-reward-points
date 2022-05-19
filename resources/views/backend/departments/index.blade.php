@extends('backend_layout')
@section('conten')
<div class="container table-responsive" style="padding-top: 20px;">
        <div >
            <a style="display: inline;float: left;margin-right: 40px" class="btn btn-primary" href="{{route('admin.department.create')}}">New Department<i></i></a>
             <a style="display: inline;float: left;" class="btn btn-primary" href="{{route('admin.department.softdeletes')}}">List Deleted Department<i></i></a>
             <br><br><br>
            <h1 style="text-align: center;">Manager Department</h1>
            <br>
             <?php
                $message=Session::get('message');
                if ($message) {
                    echo '<span style="color:blue" class="textalert">'.$message.'</span>';
                    Session::put('message',null);
                 }
             ?>
            <hr>
        </div>
       
        <table class="table table-bordered table-hover table-striped">
            <thead class="bg-info text-light">
                <th style="width: 7.5%;"><i class="bi bi-grid-3x3-gap-fill"></i> No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Create</th>
                <th>Update</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                 @foreach($departments as $key => $depart)
                <tr>
                    <td style="vertical-align: middle;">{{ $depart->id }}</td>
                    <td style="vertical-align: middle;"><a href="{{route('admin.department.show',$depart->id)}}">{{$depart->name}}</a></td>
                    <td style="vertical-align: middle;"></td>
                    <td style="vertical-align: middle;">{{$depart->desc}}</td>
                    <td>
                    @if($depart->status==1)
                        <input type="button" data-route="admin.department.changstatus" data-status="0" data-id="{{$depart->id}}" class="btn btn-primary btn-xs department_status_btn" value="Active" >
                    @else 
                        <input type="button" data-route="admin.department.changstatus" data-status="1" data-id="{{$depart->id}}" class="btn btn-danger btn-xs department_status_btn" value="UnActive" >
                    @endif
                    </td>
                    <td style="vertical-align: middle;">{{$depart->create_at}}</td>
                    <td style="vertical-align: middle;">{{$depart->update_at}}</td>
                    <td style="vertical-align: middle;">
                     <a href="{{route('admin.department.edit',$depart->id)}}" class="edit" >Edit</a>
                    <form action="{{route('admin.department.destroy',$depart->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Bạn muốn xóa phòng ban này?')" class="btn-danger delete ">Delete</button>
                    </form>
                     </td>
                </tr>
                  @endforeach
            </tbody>
        </table>
    </div>

@endsection