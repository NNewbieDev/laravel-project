@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="content-block d-flex justify-content-center ">
            <div class="articles">
                <div class="filter text-end">
                    <div class="filter-dropdown">
                        <i class="fa-solid fa-filter filter-icon"></i>
                        <div class="filter-block">
                            <div class="filter-btn"><a href="{{ route('latest') }} ">Mới nhất</a></div>
                            <div class="filter-btn"><a href="{{ route('oldest') }} ">Cũ nhất</a></div>
                        </div>
                    </div>
                </div>
                <div class="article-items ">
                    @foreach ($result as $item)
                        <div class="item-list">
                            <h3 class="item-title">
                                <a href="{{ route('news', ['id' => $item->ArticleID]) }}">{{ $item['title'] }}</a>
                            </h3>
                            {{-- {{ $item['content'] }} --}}
                            <div class="content-block">
                                <div class="item-content d-flex">
                                    {{-- !! để lấy đc thẻ html --}}
                                    {!! $item['description'] !!}
                                </div>
                            </div>
                            @if (Auth::user())
                                <div class="react-block d-flex">
                                    <div class="like">
                                        <i class="fa-solid fa-thumbs-up"></i>
                                    </div>
                                    <div class="comment">
                                        <i class="fa-solid fa-comment"></i>
                                    </div>
                                </div>
                            @else
                                <div class="react-block d-flex">
                                    <div class="not-like">
                                        <i class="fa-solid fa-thumbs-up"></i>
                                    </div>
                                    <div class="not-comment">
                                        <i class="fa-solid fa-comment"></i>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                    <div class="paginate">{{ $result->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
