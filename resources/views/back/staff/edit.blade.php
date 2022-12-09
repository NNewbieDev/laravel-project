@extends('back.template.master')

@section('title', 'Chào mừng bạn đến với trang quản trị website')

@section('heading', 'Chỉnh sửa người dùng')


@section('content')

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Thông tin của bạn</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{ url('admin/staff/edit/' . $User->id) }}" method="POST">
                <div class="card-body">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <select class="form-control" name="lavel">
                            @if (isset($UserLevel) && count($UserLevel) > 0)
                                @foreach ($UserLevel as $k => $v)
                                    <option value="{{ $v->id }}"
                                        @if ($v->id == $User->role) selected="" @endif>
                                        Cấp bậc: {{ $v->role_name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="status">

                            <option value="1" @if ($User->status) selected="" @endif>
                                Trạng thái: Bật
                            </option>
                            <option value="0" @if ($User->status) selected="" @endif>
                                Trạng thái: Tắt
                            </option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Họ và tên <span class="color_red">*</span></label>
                        <input type="text" class="form-control" name="fullname" value="{{ $User->fullname }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email <span class="color_red">*</span></label>
                        <input type="email" class="form-control" name="email" value="{{ $User->email }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Số điện thoại <span class="color_red">*</span></label>
                        <input type="text" class="form-control" name="phone" value="{{ $User->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Địa chỉ</label>
                        <input type="text" class="form-control" name="adress" value="{{ $User->address }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Loại tài khoản<span class="color_red">*</span></label>
                        <input type="text" class="form-control" name="username" value="{{ $User->username }}"
                            disabled="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mật khẩu <span class="color_red">*</span></label>
                        <input type="password" class="form-control" name="password">
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
