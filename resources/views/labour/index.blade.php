@extends('layouts.main')

@section('content')
@error('message')
{{ $message }}
@enderror
<section style="background-color: #eee;">
    <div class="container py-5 mt-5">
        <x-cards.profile-card :profile="$profile" />
    </div>
</section>
<x-modals.profile :profile="$profile" />
@endsection