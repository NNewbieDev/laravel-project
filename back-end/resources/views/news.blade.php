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
                        @if ($item->articleID == Session::get('key'))
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
