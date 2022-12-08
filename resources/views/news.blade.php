@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="content-block d-flex justify-content-center ">
            <div class="content">
                <h1 class="content-title">{{ $article->title }}</h1>
                <div class="content-img">
                    {!! $article->description !!}
                </div>
                <div class="content-text">{{ $news }}</div>
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
                        const comment = document.querySelector('.comment');
                        const warning = document.querySelector('.warning');
                        const showComment = document.querySelector('.comment-input');

                        const closeWarning = document.querySelector('.close-icon');

                        for (const like of likes) {
                        like.addEventListener('click', function (e) {
                        like.classList.toggle('pick');
                        });
                        };
                        comment.addEventListener('click', function (e) {
                        showComment.classList.toggle('active');
                        });
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
                <div class="comment-input">
                    <form action="{{ route('comment') }}" method="POST">
                        @csrf
                        <input type="text" class="comment-user" placeholder="Hãy để lại bình luận của bạn!"
                            name="comment">
                        <button type="submit" class="post-btn">
                            <i class="fa-solid fa-paper-plane post-icon"></i>
                        </button>
                    </form>
                </div>
                <div class="comment-block">
                    <h2>Bình luận</h2>
                    @foreach ($comment as $item)
                        @if ($item->ArticleID == Session::get('key'))
                            <div class="comment-item">
                                <div class="comment-username">
                                    @if ($item->role == 0)
                                        <i class="fa-solid fa-user"></i>
                                    @else
                                        @if ($item->role == 1)
                                            <i class="fa-solid fa-user-pen"></i>
                                        @else
                                            <i class="fa-solid fa-user-headset"></i>
                                        @endif
                                    @endif
                                    {{ $item->username }}
                                </div>
                                <div class="comment-content">
                                    {{ $item->content }}
                                </div>
                                @if (Auth::user())
                                    <div class="like">
                                        <i class="fa-solid fa-thumbs-up"></i>
                                    </div>
                                @else
                                    <div class="not-like">
                                        <i class="fa-solid fa-thumbs-up"></i>
                                    </div>
                                @endif
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-main')
    const account = document.querySelector('.account-icon');
    const dropdown = document.querySelector('.dropdown');

    account.addEventListener('click', function (e) {
    dropdown.classList.toggle('active');
    });
@endsection
