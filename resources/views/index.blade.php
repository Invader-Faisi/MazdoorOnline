@extends('layouts.main')

@section('content')
<!-- Hero section is only avaiable on main page -->
<x-hero />
<!-- /hero section -->


<h3 class="text-center py-4">
    <small class="text-muted"><u>AVAILABLE LABOURS & JOBS</u></small>
</h3>
<div class="container">
    <div class="row">
        <div class="col-md">
            <h5 class="text-center py-2">
                <small class="text-muted"><u>LABOURS</u></small>
            </h5>
            @foreach($portfolios as $portfolio)
            <section class="mx-auto my-2" style="max-width: 35rem;">

                <div class="card testimonial-card mt-2 mb-3">
                    <div class="card-up aqua-gradient"></div>
                    <div class="avatar mx-auto white">
                        <img src="{{ asset('images/labour.jpg') }}" class="rounded-circle img-fluid" alt="Cards">
                    </div>
                    <div class="card-body text-center">
                        <h4 class="card-title font-weight-bold">{{$portfolio->name}}</h4>
                        <hr>
                        <h6 class="card-title font-weight-bold">{{$portfolio->experience}}</h6>
                        <p>{{$portfolio->skills}}</p>
                    </div>
                </div>

            </section>
            @endforeach
        </div>
        <div class="col-md">
            <h5 class="text-center py-2">
                <small class="text-muted"><u>JOBS</u></small>
            </h5>
            @foreach ($jobs as $job)
            <section class="mx-auto my-2" style="max-width: 35rem;">

                <div class="card testimonial-card mt-2 mb-3">
                    <div class="card-up aqua-gradient"></div>
                    <div class="avatar mx-auto white">
                        <img src="{{ asset('images/employer.jpg') }}" class="rounded-circle img-fluid" alt="Cards">
                    </div>
                    <div class="card-body text-center">
                        <h4 class="card-title font-weight-bold">{{$job->title}}</h4>
                        <hr>
                        <h6 class="card-title font-weight-bold">{{$job->location}}</h6>
                        <p>{{$job->rate}}</p>
                        <p>{{$job->description}}</p>
                    </div>
                </div>

            </section>
            @endforeach
        </div>
    </div>
</div>
@endsection