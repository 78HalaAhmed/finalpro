@extends('users.layouts.main')

@section('title')
    About Us
@endsection

@push('header')
    About
@endpush

@section('content')
    @include('users.includes.header')
    @include('users.includes.about')
@endsection