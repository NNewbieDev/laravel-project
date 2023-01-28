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
                <div class="article-items">
                    @foreach ($result as $item)
                        <div class="item-list">
                            <h3 class="item-title">
                                {{-- {{ dd($item) }} --}}
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
                                @section('js-flex')
                                    const likes = document.querySelectorAll('.like');
                                    for (const like of likes) {
                                    like.addEventListener('click', function (e) {
                                    like.classList.toggle('pick');
                                    });
                                    };
                                @endsection
                            @else
                                <div class="react-block d-flex">
                                    <div class="not-like">
                                        <i class="fa-solid fa-thumbs-up"></i>
                                    </div>
                                    <div class="not-comment">
                                        <i class="fa-solid fa-comment"></i>
                                    </div>
                                </div>
                                @section('js-flex')
                                    const notLikes = document.querySelectorAll('.not-like');
                                    const notComment = document.querySelectorAll('.not-comment');
                                    const warning = document.querySelector('.warning');
                                    const closeWarning = document.querySelector('.close-icon');


                                    for (const not of notLikes) {
                                    not.addEventListener('click', function (e) {
                                    warning.classList.add('active-flex');
                                    });
                                    };

                                    for (const not of notComment) {
                                    not.addEventListener('click', function (e) {
                                    warning.classList.add('active-flex');
                                    });
                                    };

                                    closeWarning.addEventListener('click', function (e) {
                                    warning.classList.remove('active-flex');
                                    });
                                @endsection
                            @endif
                        </div>
                    @endforeach
                    <div class="paginate">{{ $result->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-main')
    const account = document.querySelector('.account-icon');
    const dropdown = document.querySelector('.dropdown');
    const filter = document.querySelector('.filter-icon');
    const filterBlock = document.querySelector('.filter-block');

    account.addEventListener('click', function (e) {
    dropdown.classList.toggle('active');
    });

    filter.addEventListener('click', function (e) {
    filterBlock.classList.toggle('active');
    });
@endsection
