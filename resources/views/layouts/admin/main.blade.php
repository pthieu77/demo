<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{asset('/assets/images/favico.png')}}">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <title>@yield('page_title')</title>
   @include('layouts.admin.main_css')
  </head>
  <body>

  <!-- start preloader -->
  <div class="preloader">
      <div class="lds-ripple">
          <div class="lds-pos"></div>
          <div class="lds-pos"></div>
      </div>
  </div>
  <!-- end preloader -->

  <div id="main-wrapper">
    @include('layouts.admin.header')

    @include('layouts.admin.sidebar')

    @yield('page_content')

    @include('layouts.admin.footer')
  </div>
    
  @include('layouts.admin.main_js')
  </body>
</html>
