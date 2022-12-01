@extends('back.template.master')
 
@section('title', 'Chào mừng bạn đến với trang quản trị website')

@section('heading', 'Chào mừng bạn đến trang thông tin')
 
 
@section('content')
    
<div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thông tin của bạn</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start --> 
              <form role="form" action="{{url('admin/staff/profile')}}" method="POST">
                <div class="card-body">
                {!! csrf_field() !!}
                <input type="hiden" name="id" value="{{Auth::user()->id}}" />
                  <div class="form-group">
                    <label for="exampleInputEmail1">Họ và tên <span class="color_red">*</span></label>
                    <input type="text" class="form-control" name="fullname" value="{{Auth::user()->fullname}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email <span class="color_red">*</span></label>
                    <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Số điện thoại <span class="color_red">*</span></label>
                    <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Địa chỉ</label>
                    <input type="text" class="form-control" name="adress" value="{{Auth::user()->adress}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Loại tài khoản</label>
                    <input type="text" class="form-control" name="username" value="{{Auth::user()->username}}"
                    disabled="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" >
                    <p class="ad_note_password">*Để trống trường này nếu không muốn đổi mật khẩu.</p>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                </div>
              </form>
            </div>
        

          </div>

@endsection