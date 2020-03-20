@extends('layouts.admin.main')

@section('page_title')
    500
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
                            <li class="breadcrumb-item active" aria-current="page">500</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <h1 style="font-size: 100px;">500</h1>
            <p>HTTP 500 Internal Server Error</p>
        </div>
    </div>

@endsection

@section('js')
    
@endsection

