@extends('back.template.master')

@section('title', 'Quản lí mạng xã hội')

@section('heading', 'Danh sách mạng xã hội')

@section('social', 'active')


@section('content')
    <div class="col-md-12">

        <div class="card">
            <!-- card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text_align_center">STT</th>
                            <th>Tên mạng xã hội</th>
                            <th class="text_align_center">Trạng thái</th>
                            <th class="text_align_center">Xắp sếp</th>
                            <th class="text_align_center"> <i class="fas fa-wrench"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($Social) && count($Social) > 0)
                            @foreach ($Social as $k => $v)
                                <tr>
                                    <td class="text_align_center">{{ $k + 1 }}</td>
                                    <td>{{ $v->social_name }}</td>
                                    <td>
                                        @if ($v->status == 1)
                                            Bật
                                        @else
                                            Tắt
                                        @endif
                                    </td>
                                    <td>{{ $v->sort }}</td>
                                    <td class="text_align_center">
                                        <a href="{{ url('admin/social/edit/' . $v->id) }}" title="Chỉnh sửa"
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
