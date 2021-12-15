@extends('backend_layout')
@section('conten')
<div class="container">
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <h1 class="panel-heading">
                            Sửa Tiêu Chí Điểm Thưởng !
                        </h1>
                        <br>
                        <div class="panel-body">
                            <div class="position-center" style="width: 30%;">
                                <form role="form" action="{{route('update-poits',$point->id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Mô tả tiêu chí:</label><span style="color:red;"> *</span>
                                     <input type="text" name="desc" class="form-control" placeholder="Nhập tên" value="{{$point->desc}}" required>
                                </div>
                                    @if ($errors->has('desc'))
                                    <p style="color:red;"><span style="color:red;"> *</span>{{$errors->first('desc') }}</p>
                                @endif
                                <div class="form-group">
                                    <label>Điểm</label><span style="color:red;"> *</span>
                                     <input type="number" max="10" min="-10" name="number_point" class="form-control" value="{{$point->number_point}}" required>
                                </div>
                                    @if ($errors->has('number_point'))
                                    <p style="color:red;"><span style="color:red;"> *</span>{{$errors->first('number_point') }}</p>
                                @endif
                                <button type="submit" name="update_points" class="btn btn-info">Update tiêu chí</button>
                            </form>
                            </div>
                        </div>
                    </section>
            </div>
        </div>
    </div>
@endsection
