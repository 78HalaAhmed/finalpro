@extends('users.layouts.main')

@section('title')
    Testimonials
@endsection

@push('header')
    Testimonials
@endpush

@section('content')
    @include('users.includes.header')
    @include('users.includes.testimonials')
@endsection