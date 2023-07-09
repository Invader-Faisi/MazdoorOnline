@props(['Portfolio','lab_rating'])

@php

$count = 0;
$rate = 0;
if($lab_rating != null){
foreach($lab_rating->GetRating as $rating){
if($rating->rating_by == "Employer" && $rating->labour_id == $Portfolio->labour_id){
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
            <img src="{{ asset('/images/emp.png') }}" class="rounded-circle me-3" height="50px" width="50px" alt="avatar" />
            <div>
                <h6 class="card-title font-weight-bold mb-2">{{ $Portfolio->name }}</h6>
                <div class="d-flex flex-row">
                    <p style="font-size: 12px">Labour Rating :</p>
                    <div class="text-danger me-2" style="font-size:12px">
                        @if ($lab_rating != null)
                        @for ($i = 0; $i < $rate; $i++) <i class="fa fa-star text-danger"></i>
                            @endfor
                            @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
            <img class="img-fluid" src="{{ asset('/images/labour.png') }}" alt="Card image cap" style="width: 100%; height:200px"/>
            <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            </a>
        </div>
        <div class="card-body">
            <p class="card-text collapse" id="collapseContent{{ $Portfolio->id }}labour">
                Skills :
                <x-cards.skills :skills="$Portfolio->skills" /><br />
                Hourly Rate : Rs&nbsp;<span class="text-success">{{ $Portfolio->hourly_rate }}</span>
            </p>
            <div class="d-flex justify-content-between">
                <a class="btn btn-link link-danger p-md-1 my-1" data-mdb-toggle="collapse" href="#collapseContent{{ $Portfolio->id }}labour" role="button" aria-expanded="false" aria-controls="collapseContent">Read more</a>
                <div>
                    @if (session()->has('user_type'))
                    <a href="/employer/labour/{{ $Portfolio->labour_id }}" class="btn btn-primary btn-sm">Details</a>
                    @else
                    <i class="fas fa-ad fa-2x text-primary"></i>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>