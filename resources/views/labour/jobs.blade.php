@extends('layouts.main')

@section('content')
<section>
    <h2 class="text text-center text-primary py-5 mt-5">AVAILABLE JOBS</h2>
    <div class="container py-5 mt-5">
        <div class="row">
            <h5 class="text-center py-2">
            </h5>
        </div>
        <div class="row">
            @foreach ($jobs as $job)
            <x-cards.job-card :Job="$job" :emp_rating="$job->GetEmployer" />
            @endforeach
        </div>
        {{ $jobs->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
</section>
@endsection