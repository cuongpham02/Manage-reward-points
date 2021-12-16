@extends('backend_layout')
@section('conten')
<div class="container table-responsive" style="padding-top: 20px;">
        <div >
            <a style="display: inline;float: left;margin-right: 40px" class="btn btn-primary" href="{{route('add-new-staff')}}">Thêm nhân viên mới<i></i></a>
             <a style="display: inline;float: left;" class="btn btn-primary" href="{{route('show-poits')}}">Xem tiêu chí điểm thưởng<i></i></a>
             <br><br><br>
            <h1 style="text-align: center;">Quản lý nhân viên</h1>
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
                <th>Tên Nhân Viên</th>
                <th>Phòng Ban</th>
                <th>Email</th>
                <th>Số Đt</th>
                <!-- <th>Tổng điểm thưởng tháng: {{$month}}</th> -->
                <th></th>
                <th></th>
            </thead>
            <tbody>
                <?php $i=1 ?>
                 @foreach($staffs as $key => $staff)
                <tr>
                    <td style="vertical-align: middle;"><?= $i++ ?></td>
                    <td style="vertical-align: middle;"><a href="{{route('show-detail-staff',$staff->id)}}">{{$staff->name}}</a></td>
                    <td style="vertical-align: middle;"></td>
                    <td style="vertical-align: middle;">{{$staff->email}}</td>
                    <td style="vertical-align: middle;">{{$staff->phone}}</td>
                    <!-- <td style="vertical-align: middle;">{{$staff->tong}}</td> -->

                    <td style="vertical-align: middle;">
                     <a href="{{route('show-bonus-staff',$staff->id)}}" class="btn-warning test">Chấm điểm</a>
                     </td>
                    <td style="vertical-align: middle;">
                     <a href="{{route('show-edit-staff',$staff->id)}}" class="edit" >Sửa</a>
                    <form action="{{route('destroy-staff',$staff->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Bạn muốn xóa nhân viên này?')" class="btn-danger delete ">Xóa</button>
                    </form>
                     </td>
                </tr>
                  @endforeach
            </tbody>
        </table>
    </div>
@endsection