@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="content-block row justify-contents-center">
            <div class="hot-news row">
                <div class="hot-news-left col-lg-6">

                </div>
                <div class="hot-news-right col-lg-6">

                </div>
            </div>
            <div class="articles row">
                <div class="filter">
                    <select name="filter" id="filter">
                        <option value="new">Mới nhất</option>
                        <option value="old">Cũ nhất</option>
                    </select>
                </div>
                <div class="article-items">
                    rss
                </div>
            </div>
        </div>
    </div>
@endsection
