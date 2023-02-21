@if (session()->has('message'))
<script src="{{asset('/lib/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('lib/js/toastr.min.js')}}"></script>
<script type="text/javascript">
toastr.success('{{ session("message") }}');
</script>

@endif
@if (session()->has('errors'))
<script src="{{asset('/lib/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('lib/js/toastr.min.js')}}"></script>
<script type="text/javascript">
toastr.error('{{ session("errors") }}');
</script>
@endif