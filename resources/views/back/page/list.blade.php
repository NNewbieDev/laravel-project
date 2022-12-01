@extends('back.template.master')

@section('title', 'Quản lí trang')

@section('heading', 'Danh sách trang')

@section('page', 'active')


@section('content')
    <div class="col-md-12">

        <div class="card">
            <!-- card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text_align_center">STT</th>
                            <th>Tên trang</th>
                            <th>Trạng thái</th>
                            <th>Xắp sếp</th>
                            <th class="text_align_center"> <i class="fas fa-wrench"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($Page) && count($Page) > 0)
                            @foreach ($Page as $k => $v)
                                <tr>
                                    <td class="text_align_center">{{ $k + 1 }}</td>
                                    <td>{{ $v->page_name }}</td>
                                    <td>
                                        @if ($v->status == 1)
                                            Bật
                                        @else
                                            Tắt
                                        @endif
                                    </td>
                                    <td>{{ $v->sort }}</td>
                                    <td class="text_align_center">
                                        <a href="{{ url('admin/page/edit/' . $v->id) }}" title="Chỉnh sửa"
                                            class="ad_button">
                                            <i class="fas fa-edit"> </i>
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
