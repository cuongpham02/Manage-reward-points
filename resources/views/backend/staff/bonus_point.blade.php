@extends('backend_layout')
@section('conten')
<div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-11">
                    <section class="panel">
                        <div class="panel-body">
                            <br>
                            <div>
                                    <h4>Tên Nhân Viên: {{$staff->name}}</h4>
                            </div>
                            <br>
                           <div>
                                <form role="form" action="{{route('save-bonus',$staff->id)}}" method="post">
                                    {{ csrf_field() }}
                                <label for="exampleInputEmail1">Điểm:</label><span style="color:red;"> *</span>
                                @foreach($points as $po)
                                    <div style="margin-left: 40px;" class="form-check">
                                    <input type="checkbox" class="form-check-input" name="point_id[]" value="{{$po->id}}">
                                    <label for="exampleCheck">{{$po->desc}} ( {{$po->number_point}} )</label>
                                    </div>
                                @endforeach  
                                <div class="form-group">
                                    <label>Thời gian</label><span style="color:red;"> *</span>
                                     <input style="width: 20%" type="date"  name="date" class="form-control" value="{{$date}}" required>
                                </div>                                  
                                <button type="submit" name="add_points" class="btn btn-info">OK</button>
                                </form>
                            </div>
                        </div>
                    </section>

            </div>
@endsection
