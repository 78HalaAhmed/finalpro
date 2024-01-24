@extends('users.layouts.main')

@section('title')
    Car Listing
@endsection

@push('header')
    Listings
@endpush

@section('content')
    @include('users.includes.header')
    @include('users.includes.pagination')
    @include('users.includes.testimonials')
@endsection