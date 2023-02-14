@extends('layouts.main')

@section('content')
<section style="background-color: #eee;">
    <div class="container py-5 mt-5">
        <x-cards.details-card :job="$job" />
    </div>
</section>

@endsection