@extends('layouts.main')

@section('content')
<section style="background-color: #eee;">
    <div class="container py-5 mt-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <h5 class="my-1 text-primary">Labour</h5>
                        <img src="{{ asset('images/user.png') }}" alt="avatar" class="rounded-circle img-fluid"
                            style="width: 150px;">
                        <h5 class="my-3">{{ $portfolio->GetLabour->name }}</h5>
                        <p class="text-muted mb-1">{{ $portfolio->GetLabour->email }}</p>
                        <p class="text-muted mb-1">{{ $portfolio->GetLabour->contact }}</p>
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
                                <h5 class="text-primary mb-0">Portfolio Details</h5>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Title</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $portfolio->name }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Experience</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $portfolio->experience }}&nbsp;Years</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            @if ($bid == null)
                            <div class="col-sm-3">
                                <p class="mb-0">Hourly Rate</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">Rs :&nbsp;{{ $portfolio->hourly_rate }}</p>
                            </div>
                            @else
                            <div class="col-sm-3">
                                <p class="mb-0">Place Bid</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">Rs :&nbsp;{{ $bid->bid }}</p>
                            </div>
                            @endif

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Skills</p>
                            </div>
                            <div class="col-sm-9">
                                <x-cards.skills :skills="$portfolio->skills" />
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            @if ($jobid != null)
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-primary" data-mdb-toggle="modal"
                                    data-mdb-target="#assignModal">Assign Job</button>
                            </div>
                            <x-modals.job-assign :jobid="$jobid" :labourid="$portfolio->labour_id" :bid="$bid->id" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection