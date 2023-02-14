@if (session()->has('message'))
<div class="container col-4 text-white bg-success mx-auto py-2 fixed-top text-center opacity-50">
    {{ session('message') }}
</div>
@endif
@if (session()->has('error'))
<div class="container col-4 text-white bg-danger mx-auto py-2 fixed-top text-center opacity-50">
    {{ session('error') }}
</div>
@endif