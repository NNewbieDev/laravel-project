@extends('back.template.master')

@section('title', 'Duyệt bài đăng')

@section('heading', 'Danh sách các bài đăng cần duyệt')

{{-- @section('contact', 'active') --}}


@section('content')
    <div class="col-md-12">

        <div class="card">
            <!-- card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text_align_center">STT</th>
                            <th>Tiêu đề</th>
                            <th>Thể loại</th>
                            <th>Tác giả</th>
                            <th class="text_align_center"> <i class="fas fa-wrench"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($postProcessList) && count($postProcessList) > 0)
                            @foreach ($postProcessList as $k => $p)
                                <tr>
                                    <td class="text_align_center">{{ $k + 1 }}</td>
                                    <td><a href="#">{{ $p->title }}</a></td>
                                    <td>{{ $p->page_name }}</td>
                                    <td>{{ $p->user_name }}</td>
                                    <td class="text_align_center">
                                        <a href="{{ url('admin/post-process/accept/' . $p->id) }}" title="Chấp nhận"
                                            class="ad_button">
                                            <i class="fas fa-check"></i>
                                        </a>
                                        <a href="{{ url('admin/post-process/refuse/' . $p->id) }}" title="Xóa"
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
