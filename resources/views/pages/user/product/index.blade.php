@extends('layouts.user.main')

@section('page_title')
    Product
@endsection

@section('css')
    <link href="{{asset('page/user/product/product.css')}}" rel="stylesheet">
@endsection

@section('page_content')

    <!-- start features-section -->
    @include('sessions.user.product.product')
@endsection

@section('js')
    <script src="{{asset('page/user/product/product.js')}}"></script> 
@endsection

