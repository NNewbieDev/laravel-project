@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="content-block d-flex justify-content-center ">
            <div class="articles">
                <div class="filter text-end">
                    <select name="filter" id="filter">
                        <option value="{{ route('latest') }}">Mới nhất</option>
                        <option value="{{ route('oldest') }}">Cũ nhất</option>
                    </select>
                </div>
                <div class="article-items ">
                    @foreach ($result as $item)
                        <div class="item-list">
                            <h3 class="item-title">{{ $item['title'] }}</h3>
                            {{-- {{ $item['content'] }} --}}
                            <div class="content-block">
                                <div class="item-content d-flex">
                                    {{-- !! để lấy đc thẻ html --}}
                                    {!! $item['description'] !!}
                                </div>
                            </div>
                            <div class="react-block d-flex">
                                <div class="like">
                                    <i class="fa-solid fa-thumbs-up"></i>
                                </div>
                                <div class="comment">
                                    <i class="fa-solid fa-comment"></i>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
