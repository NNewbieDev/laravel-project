@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="content-block ">
            <div class="hot-news">
                <div class="hot-news-left col-lg-6">

                </div>
                <div class="hot-news-right col-lg-6">

                </div>
            </div>
            <div class="articles">
                <div class="filter ">
                    <select name="filter" id="filter">
                        <option value="new">Mới nhất</option>
                        <option value="old">Cũ nhất</option>
                    </select>
                </div>
                <div class="article-items ">
                    @foreach ($result as $item)
                        <div class="item-list w-50 d-flex align-items-center flex-column">
                            <h2 class="item-title">{{ $item['title'] }}</h2>
                            {{-- {{ $item['content'] }} --}}
                            <div class="item-content d-flex flex-column ">
                                {!! $item['description'] !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
