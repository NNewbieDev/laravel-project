@extends('author.layout.layout')
@section('title')
    {{ $title }}
@endsection
@section('header')
    @include('author.header')
@endsection
@section('main')
    <div class="container-fluid text-center py-5" style="background-color:#353536">
        <table class="table table-dark text-start text-white text-opacity-75 rounded-3 table_news">
            <thead class="text-uppercase">
                <tr>
                    <th width="60%">Tiêu đề</th>
                    <th width="15%">Thể loại</th>
                    <th width="15%">Đăng vào lúc</th>
                    <th width="10%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($newsList as $key => $news)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center p-2 h-100">{{ $news->NewTitle }}</div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center p-2 h-100">{{ $news->CatagoryID }}</div>
                        </td>
                        <td style="vertical-align:center">
                            <div class="d-flex align-items-center">{{ $news->PostAt }}</div>
                        </td>
                        <td><a href="#"><i
                                    class="fa-solid fa-arrow-right text-white text-opacity-75 text-end arow_icon p-3 rounded-circle"
                                    title="Go to news"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
@section('footer')
    @include('author.footer')
@endsection
