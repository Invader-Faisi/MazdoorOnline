@extends('layouts.main')

@section('content')
<section style="background-color: #eee;">
    <div class="container py-5 mt-5">
        @if (session()->has('success'))
        <p class="alert alert-success">{{session('success')}}</p>
        @endif
        <div class="card col-8 mx-auto">
            <img src="{{ asset('images/jobs.jpg') }}" height="300px" class="card-img-top" alt="Wild Landscape" />
            <div class="card-body">
                <h5 class="card-title">
                    Employer :&nbsp;<span class="text-success">{{ $job->title }}</span>
                    &nbsp;&nbsp;
                    Job Title :&nbsp;<span class="text-danger">{{ $job->title }}</span>
                </h5>
                <hr>
                <p class="card-text">
                    <b>Location :</b>&nbsp;
                    <span class="badge badge-success rounded-pill d-inline">{{ $job->location }}</span>&nbsp;
                    <b>Offer:</b>&nbsp;
                    <span class="badge badge-dark rounded-pill d-inline">{{ $job->rate }}</span>&nbsp;
                    @if ($job->rate == 'Fixed')
                    <b>Job Rate:</b>&nbsp;
                    <span class="badge badge-danger rounded-pill d-inline">Rs :{{ $job->job_rate }}</span>&nbsp;
                    @endif
                </p>
                <p class="card-text">
                    <small class="text-muted">{{ $job->description }}</small>
                </p>

                <button class="btn btn-primary btn-sm" data-mdb-toggle="modal" data-mdb-target="#rateModal">
                    Rate Employer</button>
                <button class="btn btn-success btn-sm" data-mdb-toggle="modal" data-mdb-target="#bidModal">
                    Bid on Job</button>

            </div>
        </div>
    </div>
</section>
@php
$rating_by = "Labour";
$rate = "Employer"
@endphp
<x-modals.rating :ratedid="$job->employer_id" :rating_by="$rating_by" :rate="$rate" />
<x-modals.biding :jobid="$job->id" />
@endsection