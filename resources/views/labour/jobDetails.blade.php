@extends('layouts.main')

@section('content')
<section>
    <div class="container py-5 mt-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <h5 class="my-1 text-primary">Employer</h5>
                        <img src="{{ asset('images/user.png') }}" alt="avatar" class="rounded-circle img-fluid"
                            style="width: 150px;">
                        <h5 class="my-3">{{ $job->GetEmployer->name }}</h5>
                        <p class="text-muted mb-1">{{ $job->GetEmployer->email }}</p>
                        <p class="text-muted mb-1">{{ $job->GetEmployer->contact }}</p>
                        @if ($ratings != null)
                        @for ($i = 0; $i < $ratings; $i++) <i class="fa fa-star text-danger"></i>
                            @endfor
                            @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h5 class="text-primary mb-0">Job Details</h5>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Company</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $job->category }}</p>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Job Title</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $job->title }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Location</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $job->location }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Offer</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $job->rate }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Rate</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $job->job_rate }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Job Description</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $job->description }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            @if (session()->get('user_type') == 'labour')
                            @if ($portfolio != null)
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-primary" data-mdb-toggle="modal"
                                    data-mdb-target="#bidModal">Add your Bid</button>
                            </div>
                            @else
                            <div class="d-flex justify-content-center mb-2">
                                <a type="button" class="btn btn-primary" href="{{url('/labour/portfolios')}}">Create
                                    Portfolio to Bid</a>
                            </div>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<x-modals.biding :jobid="$job->id" />
@endsection