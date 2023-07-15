@extends('layouts.main')

@section('content')
<section>
    <div class="container py-5 mt-5">
        <div class="row">
            <h5 class="text-center py-2">
                <small class="text-muted"><u>AVAILABLE JOBS</u></small>
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