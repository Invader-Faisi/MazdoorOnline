@extends('layouts.main')

@section('content')
<section>
    <h2 class="text text-center text-primary py-5 mt-5">Bids On Jobs</h2>
    <div class="container d-flex justify-content-evenly">
        @foreach ($jobs as $job)
        @if ($job->status == 'Approved')
        @foreach ($job->GetBidings as $bid)
    <div class="card" style="max-width: 23rem;">
        <div class="card-body d-flex flex-row">
            <img src="{{ asset('images/user.png') }}" class="rounded-circle me-3" height="50px" width="50px" alt="avatar" />
            <div>
                <h5 class="card-title font-weight-bold mb-2">Bider :<span class="text-info text-bold h5">&nbsp;{{
                        $bid->GetBider->name }}</span></h5>
                <p class="card-text">Bid :<span class="text-success text-bold h5">&nbsp;{{ $bid->bid }}</span></p>
            </div>
        </div>
        <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
            <img class="img-fluid" src="{{ asset('images/job.jpg') }}" alt="Card image cap" />
            <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            </a>
        </div>
        <div class="card-body">
            <p class="card-text collapse" id="collapseContent{{$bid->id}}job">
                <td>{{ $job->description }}</td>
            </p>
            <hr />
            <h5 class="card-title font-weight-bold mb-2">Job :<span class="text-info text-bold h5">&nbsp;{{ $job->title
                    }}</span></h5>
            <p class="card-text">Location :<span class="text-success text-bold h5">&nbsp;{{ $job->location }}</span></p>
            <div class="d-flex justify-content-between">
                <a class="btn btn-link link-danger p-md-1 my-1" data-mdb-toggle="collapse" href="#collapseContent{{$bid->id}}job"
                    role="button" aria-expanded="false" aria-controls="collapseContent">Read more</a>
                <div>
                    <a type="button" class="btn btn-success btn-sm"
                        href="{{ url('/employer/labour') }}/{{ $bid->GetBider->GetPortfolio->id }}/{{ $job->id }}/{{ $bid->id }}">
                        View Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
    @endforeach
    </div>
</section>



@endsection