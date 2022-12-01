@extends('back.template.master')

@section('title', 'Chào mừng bạn đến với trang quản trị website')

@section('heading', 'Chỉnh sửa mạng xã hội')

@section('social', 'active')


@section('content')

    <div class="col-md-12">

        <div class="card-header">
            <a class="btn btn-block btn-danger ad_add" href="{{ url('admin/social/list') }}" title="Thêm">
                Quay lại
            </a>
        </div>
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Thông tin trang</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{ url('admin/social/edit/' . $Social->Id) }}" method="POST">
                <div class="card-body">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <select class="form-control" name="Status">

                            <option value="1" @if ($Social->Status == 1) selected="" @endif>
                                Trạng thái: Bật
                            </option>

                            <option value="0" @if ($Social->Status == 0) selected="" @endif>
                                Trạng thái: Tắt
                            </option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Tên mạng xã hội <span class="color_red">*</span></label>
                        <input type="text" class="form-control" name="Name" value="{{ $Social->SocialName }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Font <span class="color_red">*</span></label>
                        <input type="text" class="form-control" name="Font" value="{{ $Social->Font }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Sắp xếp<span class="color_red">*</span></label>
                        <input type="number" class="form-control" name="Sort" value="{{ $Social->Sort }}">
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
