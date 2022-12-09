@extends('back.template.master')

@section('title', 'Quản lí người dùng')

@section('heading', 'Danh sách người dùng')


@section('content')
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <a class="btn btn-block btn-primary ad_add" href="{{ url('admin/staff/add') }}" title="Thêm">
                    Thêm
                </a>
            </div>
            <!-- card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text_align_center">STT</th>
                            <th>Họ và tên</th>
                            <th>Cấp bậc</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th class="text_align_center"> <i class="fas fa-wrench"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($User) && count($User) > 0)
                            @foreach ($User as $k => $v)
                                <tr>
                                    <td class="text_align_center">{{ $k + 1 }}</td>
                                    <td>{{ $v->fullname }}</td>
                                    <td>{{ $v->role_name }}</td>
                                    <td>{{ $v->email }}</td>
                                    <td>{{ $v->phone }}</td>
                                    <td class="text_align_center">
                                        <a href="{{ url('admin/staff/edit/' . $v->id) }}" title="Chỉnh sửa"
                                            class="ad_button">
                                            <i class="fas fa-edit"> </i>
                                        </a>
                                        <a href="{{ url('admin/staff/delete/' . $v->id) }}" title="Xóa"
                                            class="ad_button ad_button_delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
