@extends('fronend_layout')
@section('conten')
<div class="container table-responsive" style="padding-top: 20px;">
        <div >
            <h1 style="text-align: center;">Danh sách nhân viên</h1>
            <hr>
            Tìm Kiếm nhân viên:
            <div>
                <form class="row" action="">
                    <div class="m-sm-4">
                        <label>Phòng ban:</label>
                        <select>
                            <option>Phòng ban</option>
                        </select>
                    </div>
                    <div class="m-sm-4">
                        <label>Tên Nhân Viên:</label>
                        <select name="name">
                            <option>---none---</option>
                        @foreach($staffs as $staff)
                            <option value="{{$staff->id}}">{{$staff->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="m-sm-4">
                        <label>Tháng:</label>
                        <select name="month">
                            <option value="1">Tháng 1</option>
                            <option value="2">Tháng 2</option>
                            <option value="3">Tháng 3</option>
                            <option value="4">Tháng 4</option>
                            <option value="5">Tháng 5</option>
                            <option value="6">Tháng 6</option>
                            <option value="7">Tháng 7</option>
                            <option value="8">Tháng 8</option>
                            <option value="9">Tháng 9</option>
                            <option value="10">Tháng 10</option>
                            <option value="1q">Tháng 11</option>
                            <option value="12">Tháng 12</option>
                        </select>
                    </div>
                     
                        <input style="height: 30px; margin-top: 20px;" class="btn-warning" type="submit" name="" value="Tìm">
                    
                </form>
            </div>
            <hr>
        </div>
        <table class="table table-bordered table-hover table-striped">
            <thead class="bg-info text-light">
                <th style="width: 7.5%;"><i class="bi bi-grid-3x3-gap-fill"></i> No</th>
                <th>Tên Nhân Viên</th>
                <th>Phòng Ban</th>
                <th>Tổng điểm thưởng tháng: {{$month}}</th>
            </thead>
            <tbody>
                <?php $i=1 ?>
                 @foreach($staffs as $key => $staff)
                <tr>
                    <td style="vertical-align: middle;"><?= $i++ ?></td>
                    <td style="vertical-align: middle;"><a href="{{route('show-detail-home',$staff->id)}}">{{$staff->name}}</a></td>
                    <td style="vertical-align: middle;"></td>
                    <td style="vertical-align: middle;">{{$staff->tong}}</td>
                </tr>
                  @endforeach
            </tbody>
        </table>
    </div>
@endsection