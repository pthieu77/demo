@extends('layouts.admin.main')

@section('page_title')
    403
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
                            <li class="breadcrumb-item active" aria-current="page">403</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <h1 style="font-size: 100px;">403</h1>
            <p>HTTP 403 is a standard HTTP status code communicated to clients by an HTTP server to indicate that access to the requested (valid) URL by the client is Forbidden for some reason. </p>
        </div>
    </div>

@endsection

@section('js')
    
@endsection

