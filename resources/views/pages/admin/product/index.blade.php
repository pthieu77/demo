@extends('layouts.admin.main')

@section('page_title')
    Home
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('lib/fileuploader/css/main.css')}}">
    <link href="{{asset('page/admin/product/product.css')}}" rel="stylesheet">
@endsection

@section('page_content')

    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Product Manager</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.page.index') }}">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            @include('sessions.admin.product.index')
        </div>
    </div>

    @include('sessions.admin.product.modal.create_update')

@endsection

@section('js')
    <script type="text/javascript" src="{{asset('lib/fileuploader/js/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('lib/fileuploader/js/jquery.modal.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('lib/ckeditor4/ckeditor.js')}}"></script>
    <script src="{{asset('page/admin/product/product.js')}}"></script>
@endsection

