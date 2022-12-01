@extends('back.template.master')

@section('title', 'Chào mừng bạn đến với trang quản trị website')

@section('heading', 'Xem liên hệ')

@section('contact', 'active')


@section('content')

    <div class="col-md-12">

        <div class="card-header">
            <a class="btn btn-block btn-danger ad_add" href="{{ url('admin/contact/list') }}" title="Quay lại">
                Quay lại
            </a>
        </div>
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Thông tin trang</h3>
            </div>
            <!-- form start -->
            <form role="form" action="{{ url('admin/contact/edit/' . $Contact->Id) }}" method="POST">
                <div class="card-body">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <select class="form-control" name="IsViews">

                            <option value="1" @if ($Contact->IsViews == 1) selected="" @endif>
                                Trạng thái: Đã xem
                            </option>

                            <option value="0" @if ($Contact->IsViews == 0) selected="" @endif>
                                Trạng thái: Chưa xem
                            </option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Họ và tên</label>
                        <input type="text" class="form-control" name="Name" value="{{ $Contact->ContactName }}"
                            disabled=''>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tên email<span class="color_red">*</span></label>
                        <input type="text" class="form-control" name="Email" value="{{ $Contact->Email }}"
                            disabled=''>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tiêu đề</label>
                        <input type="text" class="form-control" name="Title" value="{{ $Contact->Title }}"
                            disabled=''>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Lời nhắn<span class="color_red">*</span></label>
                        <textarea name="Message" disabled='' class="form-control" row='7'>{{ $Contact->Message }} </textarea>
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
