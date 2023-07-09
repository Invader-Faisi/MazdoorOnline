@extends('layouts.main')

@section('content')
<section>
    <div class="container py-5 mt-5">
        <x-cards.profile-card :profile="$profile" :ratings="$ratings" />
    </div>
</section>
<x-modals.profile :profile="$profile" />
@endsection