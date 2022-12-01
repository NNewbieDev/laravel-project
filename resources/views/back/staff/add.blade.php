@extends('back.template.master')
 
@section('title', 'Chào mừng bạn đến với trang quản trị website')

@section('heading', 'Thêm người dùng')
 
 
@section('content')
    
<div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thông tin của bạn</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start --> 
              <form role="form" action="{{url('admin/staff/add')}}" method="POST">
                <div class="card-body">
                {!! csrf_field() !!}

                  <div class="form-group">
                    <select class="form-control" name="lavel">
                    @if(isset($UserLevel) && count($UserLevel) > 0)
                        @foreach($UserLevel as $k => $v)
                        <option value="{{$v ->id}}">Cấp bậc: {{$v ->name}}</option>
                        @endforeach
                        @endif
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Họ và tên <span class="color_red">*</span></label>
                    <input type="text" class="form-control" name="fullname">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email <span class="color_red">*</span></label>
                    <input type="email" class="form-control" name="email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Số điện thoại <span class="color_red">*</span></label>
                    <input type="text" class="form-control" name="phone">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Địa chỉ</label>
                    <input type="text" class="form-control" name="adress">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Loại tài khoản <span class="color_red">*</span></label>
                    <input type="text" class="form-control" name="username" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu <span class="color_red">*</span></label>
                    <input type="password" class="form-control" name="password" >
                    
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
              </form>
            </div>
        

          </div>

@endsection