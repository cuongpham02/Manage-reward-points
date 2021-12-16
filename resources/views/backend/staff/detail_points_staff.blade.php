@extends('backend_layout')
@section('conten')
<div class="container table-responsive" style="padding-top: 20px;">
        <div >
            <h1 style="text-align: center;">Thông tin chi tiết điểm thưởng nhân viên - {{$staff->name}}</h1>
        </div>
         <?php
                                $message=Session::get('message');
                                if ($message) {
                                    echo '<span style="color:blue" class="textalert">'.$message.'</span>';
                                    Session::put('message',null);
                                 }
                             ?>
        <table class="table table-bordered table-hover table-striped">
            <thead class="bg-info text-light">
                <th style="width: 7.5%;"><i class="bi bi-grid-3x3-gap-fill"></i> No</th>
                <th>Tiêu chí chấm điểm</th>
                <th>Điểm thưởng</th>
                <th>Ngày giờ</th>
                <th></th>
            </thead>
            <tbody>
                <?php $i=1 ?>
                @foreach($points as $key => $value)
                <tr>
                    <td style="vertical-align: middle;"><?= $i++ ?></td>
                    <td style="vertical-align: middle;">{{$value->desc}}</td>
                    <td style="vertical-align: middle;">{{$value->number_point}}</td>
                    <td style="vertical-align: middle;">{{$value->date}}</td>
                    <td style="vertical-align: middle;">
                     <a href="" class="edit" >Sửa</a>
                    <form action="{{route('destroy-detils-points-staff',$value->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Bạn muốn xóa dòng này?')" class="btn-danger delete ">Xóa</button>
                    </form>
                     </td>
                </tr>
                  @endforeach
            </tbody>
        </table>
    </div>
@endsection
