@extends('layouts.admin.main')

@section('page_title')
    404
@endsection

@section('css')
    
@endsection

@section('page_content')

    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Errors Manager</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.page.index') }}">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">404</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <h1 style="font-size: 100px;">404</h1>
            <p>HTTP 404, 404 Not Found, 404, Page Not Found, or Server Not Found error message.</p>
        </div>
    </div>

@endsection

@section('js')
    
@endsection

