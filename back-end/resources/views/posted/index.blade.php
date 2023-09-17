@extends('author.layout')
@section('title')
    {{ $title }}
@endsection
@section('header')
    @include('author.secction.header')
@endsection
@section('nav')
    <h2>hello anh em</h2>
@endsection
@section('msg')
    <div class="alert alert-success">{{ $msg }}</div>
@endsection
@section('content')
    {{-- <button class="btn btn-info mb-2">Add Users</button> --}}
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ và Tên</th>
                <th>Email</th>
                <th>Create_at</th>
                <th>Edit</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr class="text-small">
                    <th>{{ $key }}</th>
                    <th>{{ $user->UserName }}</th>
                    <th>{{ $user->Email }}</th>
                    <th>{{ $user->Create_at }}</th>
                    <th width="5%">
                        <a href="{{ route('author.edit', ['id' => $user->UserID]) }}" class="btn btn-warning">Edit</a>
                    </th>
                    <th width="5%">
                        <a href="{{ route('author.destroy', ['id' => $user->UserID]) }}" class="btn btn-danger">Remove</a>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
{{-- @section('css')
    @assets('css/style')
@endsection --}}
