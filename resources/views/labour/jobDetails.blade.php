@extends('layouts.main')

@section('content')
<div class="container py-5 mt-5">
    <div class="card col-8 mx-auto">
        <img src="{{ asset('images/jobs.jpg') }}" height="300px" class="card-img-top" alt="Wild Landscape" />
        <div class="card-body">
            <h5 class="card-title">
                Employer :&nbsp;<span class="text-success">{{$job->title}}</span>
                &nbsp;&nbsp;
                Job Title :&nbsp;<span class="text-danger">{{$job->title}}</span>
            </h5>
            <hr>
            <p class="card-text">
                <b>Location :</b>&nbsp;
                <span class="badge badge-success rounded-pill d-inline">{{ $job->location }}</span>&nbsp;
                <b>Offer:</b>&nbsp;
                <span class="badge badge-dark rounded-pill d-inline">{{ $job->rate }}</span>&nbsp;
                @if($job->rate == "Fixed")
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


<!-- Modal For Rating-->
<div class="modal fade" id="rateModal" tabindex="-1" aria-labelledby="rateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rateModalLabel">Employer Rating</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <label class="form-label"> Rate Out of 5 </label>
                    <!-- Rating input -->
                    <div class="form-outline mb-4">
                        <input type="number" id="EmployerRating" class="form-control" max="5" min="0" />
                        <label class="form-label" for="EmployerRating">Employer Rating</label>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Rating</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal For Biding-->
<div class="modal fade" id="bidModal" tabindex="-1" aria-labelledby="bidModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bidModalLabel">Bid on Job</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <label class="form-label"> Add your Bid </label>
                    <!-- Rating input -->
                    <div class="form-outline mb-4">
                        <input type="number" id="biding" class="form-control" min="0" />
                        <label class="form-label" for="biding">Add Biding</label>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Your Bid</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection