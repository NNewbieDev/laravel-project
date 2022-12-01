@extends('back.template.master')

@section('title', 'Cấu hình hệ thống')

@section('heading', 'Cấu hình hệ thống')

@section('system', 'active')


@section('content')

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">

            <!-- form start -->
            <form role="form" action="{{ url('admin/system') }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="exampleInputPassword1">Tên công ty <span class="color_red">*</span></label>
                        <input type="text" class="form-control" name="name" value="{{ $name->description }}">
                    </div>

                    <div class="form-group py-2">
                        <label for="exampleInputPassword1">Logo</label></br>
                        <img class="w-100" src="{{ url('/images/logo/' . $logo->description) }}" alt="logo" />

                        <input type="file" class="form-control my-3" name="logo">
                    </div>

                    <!-- <div class="form-group">
                                                                           
                                                                          </div> -->

                    <div class="form-group">
                        <label for="exampleInputPassword1">Email <span class="color_red">*</span></label>
                        <input type="email" class="form-control" name="email" value="{{ $email->description }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Số điện thoại <span class="color_red">*</span></label>
                        <input type="text" class="form-control" name="phone" value="{{ $phone->description }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" value="{{ $address->description }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No copyright<span class="color_red">*</span></label>
                        <input type="text" class="form-control" name="copyright" value="{{ $copyright->description }}">
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
