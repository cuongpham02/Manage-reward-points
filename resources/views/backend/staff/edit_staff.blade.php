@extends('backend_layout')
@section('conten')
<div class="container">
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <h1 class="panel-heading">
                            Thêm Users
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
                                <form role="form" action="{{route('update-staff',$staff->id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Tên Nhân Viên:</label><span style="color:red;"> *</span>
                                     <input type="text" name="name" class="form-control" placeholder="Nhập tên" value="{{$staff->name}}" required>
                                </div>
                                    @if ($errors->has('name'))
                                    <p style="color:red;"><span style="color:red;"> *</span>{{$errors->first('name') }}</p>
                                @endif
                                <div class="form-group">
                                    <label>Email:</label><span style="color:red;"> *</span>
                                     <input type="email" name="email" class="form-control" placeholder="Nhập email" value="{{$staff->email}}" required>
                                </div>
                                    @if ($errors->has('email'))
                                    <p style="color:red;"><span style="color:red;"> *</span>{{$errors->first('email') }}</p>
                                @endif
                                <div class="form-group">
                                    <label>Ngày Sinh:</label><span style="color:red;"> *</span>
                                    <input type="date" name="birthday" value="{{$staff->birthday}}" placeholder="Ngày sinh" required>
                                </div>
                                    @if ($errors->has('birthday'))
                                    <p style="color:red;"><span style="color:red;"> *</span>{{$errors->first('birthday') }}</p>
                                @endif
                                <div class="form-group">
                                    <label>Số Điện Thoại</label><span style="color:red;"> *</span><br>
                                    <input type="text" name="phone" value="{{$staff->phone}}" placeholder="Nhập sdt" required>
                                </div>
                                    @if ($errors->has('phone'))
                                    <p style="color:red;"><span style="color:red;"> *</span>{{$errors->first('phone') }}</p>
                                @endif
                                <button type="submit" name="add_staff" class="btn btn-info">Update NV</button>
                            </form>
                            </div>

                        </div>
                    </section>
            </div>
        </div>
    </div>
@endsection
