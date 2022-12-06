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
            </div>
        </div>
    </div>
@endsection
