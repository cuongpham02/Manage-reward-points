@extends('backend_layout')
@section('conten')
<div class="container">
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <h1 class="panel-heading">
                            Thêm Phong ban mới!
                        </h1>
                        <br>
                        <div class="panel-body">
                            <?php
                                $message=Session::get('message');
                                if ($message) {
                                    echo '<span class="textalert">'.$message.'</span>';
                                    Session::put('message',null);
                                 }
                             ?> 
                            <div class="position-center" style="width: 30%;">
                                <form role="form" action="{{route('admin.department.store')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Tên Phòng Ban:</label><span style="color:red;"> *</span>
                                     <input type="text" name="name" class="form-control" placeholder="Nhập tên" value="{{old('name')}}" required>
                                </div>
                                @if ($errors->has('name'))
                                <p style="color:red;"><span style="color:red;"> *</span>{{$errors->first('name') }}</p>
                                @endif
                                <div class="form-group">
                                    <label>Mô tả :</label><span style="color:red;"> *</span>
                                     <input type="text" name="desc" class="form-control" placeholder="Nhập Mô tả" value="{{old('desc')}}" required>
                                </div>
                                @if ($errors->has('desc'))
                                <p style="color:red;"><span style="color:red;"> *</span>{{$errors->first('desc') }}</p>
                                @endif
                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="form-label">Status</label>
                                    <select name="status" class="form-select" aria-label="Default select example">
                                    <option selected value="1">Active</option>
                                    <option value="0">Un Active</option>
                                </select>
                                </div>
                                <button type="submit" name="add_deparment" class="btn btn-info">Add Department</button>
                            </form>
                            </div>

                        </div>
                    </section>
            </div>
        </div>
    </div>
@endsection
