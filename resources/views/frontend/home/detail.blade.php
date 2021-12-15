@extends('fronend_layout')
@section('conten')
<div class="container table-responsive" style="padding-top: 20px;">
        <div >
            <h1 style="text-align: center;">Thông tin chi tiết điểm thưởng nhân viên - {{$staff->name}}</h1>
        </div>
        <table class="table table-bordered table-hover table-striped">
            <thead class="bg-info text-light">
                <th style="width: 7.5%;"><i class="bi bi-grid-3x3-gap-fill"></i> No</th>
                <th>Tiêu chí chấm điểm</th>
                <th>Điểm thưởng</th>
                <th>Ngày giờ</th>

            </thead>
            <tbody>
                <?php $i=1 ?>
                @foreach($points as $key => $value)
                    <tr>
                        <td style="vertical-align: middle;"><?= $i++ ?></td>
                        <td style="vertical-align: middle;">{{$value->desc}}</td>
                        <td style="vertical-align: middle;">{{$value->number_point}}</td>
                        <td style="vertical-align: middle;">{{$value->date}}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection