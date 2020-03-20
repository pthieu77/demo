@extends('layouts.user.main')

@section('page_title')
    Home
@endsection

@section('css')
    <link href="{{asset('page/user/home/home.css')}}" rel="stylesheet">
@endsection

@section('page_content')

<!-- start page-wrapper -->
    @include('layouts.user.sidebar')
    <!-- start features-section -->
    @include('sessions.user.home.home')
@endsection

@section('js')
    <script src="{{asset('page/user/home/home.js')}}"></script> 
@endsection

