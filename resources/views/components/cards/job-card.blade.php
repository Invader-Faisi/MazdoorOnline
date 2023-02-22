@props(['Job','emp_rating'])
@php

$count = 0;
$rate = 0;
if($emp_rating != null){
foreach($emp_rating->GetRating as $rating){
if($rating->rating_by == "Labour" && $rating->employer_id == $Job->employer_id){
$count++;
$rate += $rating->ratings;
}
}
if($count != 0){
$rate = round($rate/$count);
}
}
@endphp
<div class="col-xl-4 col-md-12 mb-4">
    <div class="card">
        <div class="card-body d-flex flex-row">
            <img src="{{ asset('/images/user.jpg') }}" class="rounded-circle me-3" height="50px" width="50px" alt="avatar" />
            <div>
                <h6 class="card-title font-weight-bold mb-2">{{ $Job->title }}</h6>
                <div class="d-flex flex-row">
                    <p style="font-size: 12px">Employer Rating :</p>
                    <div class="text-danger me-2" style="font-size:12px">
                        @if ($emp_rating != null)
                        @for ($i = 0; $i < $rate; $i++) <i class="fa fa-star text-danger"></i>
                            @endfor
                            @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
            <img class="img-fluid" src="{{ asset('/images/jobs.jpg') }}" alt="Card image cap" />
            <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            </a>
        </div>
        <div class="card-body">
            <p class="card-text collapse" id="collapseContent{{ $Job->id }}job">

                Offer : <span class="fw-bold text-success">{{ $Job->rate }}</span><br />
                Location : <span class="fw-bold text-success">{{ $Job->location }}</span><br />
                <span class="text-muted">{{ $Job->description }}</span>

            </p>
            <div class="d-flex justify-content-between">
                <a class="btn btn-link link-danger p-md-1 my-1" data-mdb-toggle="collapse" href="#collapseContent{{ $Job->id }}job" role="button" aria-expanded="false" aria-controls="collapseContent">Read more</a>
                <div>
                    @if (session()->has('user_type'))
                    <a href="/labour/job/{{ $Job->id }}" class="btn btn-primary btn-sm">Details</a>
                    @else
                    <i class="fas fa-ad fa-2x text-primary"></i>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>