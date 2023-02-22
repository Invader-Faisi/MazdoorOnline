@extends('layouts.main')

@section('content')
@if (!session()->has('user_type'))
<!-- Hero section is only avaiable on main page -->
<x-hero />
<!-- /hero section -->
@endif

<h3 class="text-center py-4">
    <small class="text-muted"><u>AVAILABLE LABOURS & JOBS</u></small>
</h3>
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3 mb-1">
                <h5 class="text-uppercase">portfolios</h5>
            </div>
        </div>

        <div class="row">
            @foreach ($portfolios as $portfolio)
            <x-cards.labour-card :Portfolio="$portfolio" :lab_rating="$portfolio->GetLabour" />
            @endforeach
        </div>
        <hr />
        <div class="row">
            <div class="col-12 mt-3 mb-1">
                <h5 class="text-uppercase">jobs</h5>
            </div>
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