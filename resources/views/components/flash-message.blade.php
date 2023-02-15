@if (session()->has('message'))
<script src="{{asset('/lib/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('lib/js/toastr.min.js')}}"></script>
<script type="text/javascript">
toastr.success('{{ session("message") }}');
</script>

@endif
@if (session()->has('error'))
<script src="{{asset('/lib/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('lib/js/toastr.min.js')}}"></script>
<script type="text/javascript">
toastr.error('{{ session("error") }}');
</script>
@endif