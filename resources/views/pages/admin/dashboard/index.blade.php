@extends('layouts.admin.main')

@section('page_title')
    Dashboard
@endsection

@section('css')
    <link href="{{asset('lib/chart.js/dist/Chart.min.css')}}" rel="stylesheet">
    <link href="{{asset('page/admin/dashboard/dashboard.css')}}" rel="stylesheet">
@endsection

@section('page_content')

    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Dashboard Manager</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.page.index') }}">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            @include('sessions.admin.dashboard.index')
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('lib/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('page/admin/dashboard/dashboard.js')}}"></script>
@endsection

