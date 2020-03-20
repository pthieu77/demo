<script type="text/javascript" src="{{asset('js/admin.js')}}"></script>
<script type="text/javascript" src="{{asset('lib/waitme/waitMe.min.js')}}"></script>
<script type="text/javascript" src="{{asset('lib/autoNumeric/autoNumeric.min.js')}}"></script>

<script type="text/javascript" src="{{asset('page/admin/layout/sidebarmenu.js')}}"></script>
<script type="text/javascript" src="{{asset('page/admin/layout/custom.min.js')}}"></script>

<script>
    var base_url = "{{url('/')}}";
    var base_ajax = "{{url('/ajax')}}";
</script>

<script type="text/javascript" src="{{asset('page/admin/layout/slim.js')}}"></script>

@yield('js')
