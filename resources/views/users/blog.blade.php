@extends('users.layouts.main')

@section('title')
    Blog
@endsection

@push('header')
    Blog
@endpush

@section('content')
    @include('users.includes.header')
    @include('users.includes.blog')
@endsection