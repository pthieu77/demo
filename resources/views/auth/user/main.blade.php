<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{asset('/assets/images/favico.png')}}">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <title>@yield('page_title')</title>
    <link rel="stylesheet" href="{{asset('css/auth_user.css')}}">
    <link rel="stylesheet" href="{{asset('page/auth/user/layout/style.css')}}">
    <link rel="stylesheet" href="{{asset('lib/waitme/waitMe.min.css')}}">
    @yield('css')
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

  <a class="btn-home" href="{{route('user.page.home.index')}}">
    <p>|||</p>
    Home
  </a>

  <div class="container">

    @yield('page_content')
  
  </div>

    
    <script type="text/javascript" src="{{asset('js/auth_user.js')}}"></script>
    <script type="text/javascript" src="{{asset('lib/waitme/waitMe.min.js')}}"></script>
    
    <script>
        var base_url = "{{url('/')}}";
        var base_ajax = "{{url('/ajax')}}";
        var run_waitMe = function(el, stop) {
            if (stop) {
                $(el).waitMe('hide');
            } else {
                $(el).waitMe({
                    effect: 'bounce',
                    text: 'Please wait...',
                    bg: 'rgba(255,255,255,0.7)',
                    color: '#000',
                    maxSize: '',
                    waitTime: -1,
                    textPos: 'vertical',
                    fontSize: '',
                    source: "{{asset('/assets/images/loading_heineken.gif')}}",
                    onClose: function(el) {}
                });
            }
        };
    </script>

    @yield('js')

  </body>
</html>
