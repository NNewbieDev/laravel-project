@extends('author.layout.layout')
@section('title')
    {{ $title }}
@endsection
@section('header')
    @include('author.component.header')
@endsection
@section('main')
    <div class="container-fluid text-center py-5"
        style="background-color:{{ $darkMode ? 'var(--background-color-dark)' : 'var(--background-color-light)' }}">
        <table class="table table-dark text-start p-3 text-white text-opacity-75 table_news">
            <thead class="text-uppercase ">
                <tr>
                    <th width="60%" class="p-3">Tiêu đề</th>
                    <th width="15%" class="p-3">Thể loại</th>
                    <th width="15%" class="p-3">Đăng vào lúc</th>
                    <th width="10%"></th>
                </tr>
            </thead>
            <tbody>
                @if (sizeof($newsList))
                    @foreach ($newsList as $key => $news)
                        <tr>
                            <td class="align-middle py-2 ps-3" style="padding-right:200px!important;">
                                <a href="#" class="fs-6 fw-bold m-0 text-decoration-none news_link"
                                    style="color:#C27324">
                                    {{ $news->Title }}</a>
                            </td>
                            <td class="align-middle ps-3">
                                <p class="m-0">{{ $news->PageName }}</p>
                            </td>
                            <td class="align-middle ps-3">
                                <p class="m-0">{{ date('H:i:s d/m/Y', strtotime($news->PostAt)) }}</p>
                            </td>
                            <td class="align-middle"><a href="#"><i
                                        class="fa-solid fa-arrow-right text-white text-opacity-75 text-end arow_icon p-3 rounded-circle"
                                        title="Go to news"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="ps-3">
                        <td colspan="4" class="ps-3">Chưa có bài đăng nào</td>
                    </tr>
                @endif
            </tbody>
        </table>

    </div>
@endsection
@section('footer')
    @include('author.component.footer')
@endsection
