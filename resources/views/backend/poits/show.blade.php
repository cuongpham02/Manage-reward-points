@extends('backend_layout')
@section('conten')
<div class="container table-responsive" style="padding-top: 20px;">
                                
        <div >
            <a style="display: inline;float: left;margin-right: 30px" class="btn btn-primary" href="{{route('show-add-poits')}}">Thêm tiêu chí mới<i></i></a>
            <br>
            <br><br>    
            <h1 style="text-align: center;">Danh sách tiêu chí cho điểm thưởng</h1>
            <?php
                                $message=Session::get('message');
                                if ($message) {
                                    echo '<span style="color:blue" class="textalert">'.$message.'</span>';
                                    Session::put('message',null);
                                 }
                             ?>
        </div>
        <br>
        <hr>
        <table class="table table-bordered table-hover table-striped">
            <thead class="bg-info text-light">
                <th style="width: 7.5%;"><i class="bi bi-grid-3x3-gap-fill"></i> No</th>
                <th>Mô tả tiêu chí điểm</th>
                <th>Điểm</th>
                <th></th>
            </thead>
            <tbody>
                <?php $i=1 ?>
                 @foreach($points as $key => $point)
                <tr>
                    <td style="vertical-align: middle;"><?= $i++ ?></td>
                    <td style="vertical-align: middle;">{{$point->desc}}</td>
                    <td style="vertical-align: middle;">{{$point->number_point}}</td>
                    <td>
                     <a href="{{route('show-edit-poits',$point->id)}}" class="edit" >Sửa</a>
                    <form action="{{route('destroy-poits',$point->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Bạn muốn xóa tiêu chí điểm này?')" class="btn-danger delete ">Xóa</button>
                    </form>
                     </td>
                </tr>
                  @endforeach
            </tbody>
        </table>
        {{ $points->links() }}
    </div>
@endsection