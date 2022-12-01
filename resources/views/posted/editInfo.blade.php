@extends('author.layout')
@section('title')
    {{ $title }}
@endsection
@section('header')
    @include('author.secction.header')
@endsection
@section('nav')
    <h3>Sua thong tin User</h3>
@endsection
@section('content')
@section('msg')
    <div class="alert alert-success">{{ $msg }}</div>
@endsection
<form method="POST" action="{{ route('author.edited', ['id' => $user->UserID]) }}">
    @csrf
    <div class="mb-3">
        <label class="form-label" for="fullName">Họ và tên</label>
        <input type="text" class="form-control" name="fullname" id="fullName" placeholder="Nhập họ tên muốn sửa"
            value="{{ old('fulllname') ?? $user->UserName }}">
        @error('fullname')
            <div class="alert alert-danger mt-1" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="email">Email</label>
        <input type="text" class="form-control" name="email" id="email" placeholder="Nhập email muốn sửa"
            value="{{ old('email') ?? $user->Email }}">
        @error('email')
            <div class="alert alert-danger mt-1" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Xác nhận sửa</button>
    <a href="{{ route('author.index') }}" class="btn btn-warning">Quay lại</a>
</form>
@endsection
