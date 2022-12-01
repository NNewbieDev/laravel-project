@extends('back.template.master')

@section('title', 'Chào mừng bạn đến với trang quản trị web')

@section('heading', 'Chào mừng bạn đến với trang quản trị website')


@section('content')
    <p>
        <img src="{{ url('/admin/admin.gif') }}" alt="admin animation" />
    </p>
@endsection
