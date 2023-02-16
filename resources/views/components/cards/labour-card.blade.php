@props(['Portfolio'])

<div class="col-xl-4 col-md-12 mb-4">
    <div class="card">
        <div class="card-body d-flex flex-row">
            <img src="{{ asset('/images/user.jpg') }}" class="rounded-circle me-3" height="50px" width="50px"
                alt="avatar" />
            <div>
                <h6 class="card-title font-weight-bold mb-2">{{ $Portfolio->name }}</h6>
                <div class="d-flex flex-row">
                    <p style="font-size: 12px">Labour Rating :</p>
                    <div class="text-danger me-2" style="font-size:12px">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
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
            <p class="card-text collapse" id="collapseContent{{ $Portfolio->id }}labour">
                Skills :
                <x-cards.skills :skills="$Portfolio->skills" /><br />
                Hourly Rate : Rs&nbsp;<span class="text-success">{{ $Portfolio->hourly_rate }}</span>
            </p>
            <div class="d-flex justify-content-between">
                <a class="btn btn-link link-danger p-md-1 my-1" data-mdb-toggle="collapse"
                    href="#collapseContent{{ $Portfolio->id }}labour" role="button" aria-expanded="false"
                    aria-controls="collapseContent">Read more</a>
                <div>
                    @if (session()->has('user_type'))
                        <a href="/employer/labour/{{ $Portfolio->labour_id }}"
                            class="btn btn-primary btn-sm">Details</a>
                    @else
                        <i class="fas fa-ad fa-2x text-primary"></i>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
