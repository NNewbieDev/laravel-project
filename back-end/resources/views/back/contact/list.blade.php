@extends('back.template.master')

@section('title', 'Quản lí liên hệ')

@section('heading', 'Danh sách liên hệ')

@section('contact', 'active')


@section('content')
    <div class="col-md-12">

        <div class="card">
            <!-- card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text_align_center">STT</th>
                            <th>Họ và tên</th>
                            <th>Email</th>
                            <th>Trạng thái</th>
                            <th class="text_align_center"> <i class="fas fa-wrench"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($Contact) && count($Contact) > 0)
                            @foreach ($Contact as $k => $v)
                                <tr>
                                    <td class="text_align_center">{{ $k + 1 }}</td>
<<<<<<< HEAD
                                    <td>{{ $v->contact_nae }}</td>
                                    <td>{{ $v->email }}</td>
                                    <td>
                                        @if ($v->isview == 1)
=======
                                    <td>{{ $v->contact_name }}</td>
                                    <td>{{ $v->email }}</td>
                                    <td>
                                        @if ($v->is_view == 1)
>>>>>>> 6fd057da94127d7c4441bf3e4198a414f39b620f
                                            <span class="color-isview">Đã xem</span>
                                        @else
                                            <span class="color-isview1">Chưa xem</span>
                                        @endif
                                    </td>
                                    <td class="text_align_center">
                                        <a href="{{ url('admin/contact/edit/' . $v->id) }}" title="Xem"
<<<<<<< HEAD
                                            class="
              ad_button">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ url('admin/contact/delete/' . $v->id) }}" title="Xóa"
                                            class="
              ad_button ad_button_delete">
=======
                                            class="ad_button">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ url('admin/contact/delete/' . $v->id) }}" title="Xóa"
                                            class="ad_button ad_button_delete">
>>>>>>> 6fd057da94127d7c4441bf3e4198a414f39b620f
                                            <i class="fas fa-trash-alt"> </i>
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
