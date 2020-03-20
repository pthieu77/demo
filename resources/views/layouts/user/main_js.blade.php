<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('page/user/layout/skel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('page/user/layout/util.js')}}"></script>
<script type="text/javascript" src="{{asset('page/user/layout/main.js')}}"></script>   
<script type="text/javascript" src="{{asset('lib/waitme/waitMe.min.js')}}"></script>
<script type="text/javascript" src="{{asset('page/user/layout/slim.js')}}"></script> 
    
<script>
    var base_url = "{{url('/')}}";
    var base_ajax = "{{url('/ajax')}}";
</script>

@yield('js')
