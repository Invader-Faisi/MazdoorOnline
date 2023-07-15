@extends('layouts.main')

@section('content')
<!-- Hero section  -->
<x-hero />
<!-- /hero section -->
<h1 class="text-center py-4">
    <small class="text-info"><u>LABOURS & JOBS</u></small>
</h1>
<section>
    <div class="container-fluid">
        {{ $jobs->withQueryString()->links('pagination::bootstrap-5') }}
        <div class="d-flex">
            <div class="col-6 border-top border-end border-3 border-primary p-3">
                <div class="col-12 pt-3 pb-3">
                    <h4 class="text-uppercase text-center text-primary">portfolios</h4>
                </div>
                <div class="row">
                    @foreach ($portfolios as $portfolio)
                    <x-cards.labour-card :Portfolio="$portfolio" :lab_rating="$portfolio->GetLabour" />
                    @endforeach
                </div>
            </div>
            <div class="col-6 border-top border-start border-3 border-primary p-3">
                <div class="col-12 pt-3 pb-3">
                    <h4 class="text-uppercase text-center text-primary">Jobs</h4>
                </div>
                <div class="row">
                    @foreach ($jobs as $job)            
                    <x-cards.job-card :Job="$job" :emp_rating="$job->GetEmployer" />            
                    @endforeach
                </div>
            </div>            
        </div>                
    </div>
</section>
@endsection