@extends('author.layout')
@section('title')
    {{ $title }}
@endsection
@section('header')
    @include('author.secction.header')
@endsection
@section('nav')
    <h3>Them User</h3>
@endsection
@section('content')
    <form method="POST" action="{{ route('author.postedNews') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="fullName">Họ và tên</label>
            <input type="text" class="form-control" name="fullname" id="fullName" placeholder="Nhập họ tên"
                value="{{ old('fullname') }}">
            @error('fullname')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Nhập email"
                value="{{ old('email') }}">
            @error('email')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Thêm người dùng</button>
        <a href="{{ route('author.index') }}" class="btn btn-warning">Quay lại</a>
    </form>
@endsection
@section('css')
    @assets('css/style')
@endsection
