@extends('layouts.user.main')

@section('page_title')
    Account
@endsection

@section('css')
    <link href="{{asset('page/user/account/account.css')}}" rel="stylesheet">
@endsection

@section('page_content')

<!-- start page-wrapper -->
    @include('layouts.user.sidebar')
    <!-- start features-section -->
    @include('sessions.user.account.account')
@endsection

@section('js')
    <script src="{{asset('page/user/account/account.js')}}"></script> 
@endsection

