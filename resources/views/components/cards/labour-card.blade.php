@props(['Portfolio'])

{{-- <section class="mx-auto my-2" style="max-width: 35rem;background-color: #fcf7f7;">
    <div class="card shadow-0 border rounded-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                    <div class="bg-image hover-zoom ripple rounded ripple-surface">
                        <img src="{{ asset('images/labour.jpg') }}" class="w-100" />
                        <a href="#!">
                            <div class="hover-overlay">
                                <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <h5>{{ $Portfolio->name }}</h5>
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
                    <div class="mt-1 mb-0 text-muted ">
                        <span>Skills :</span>
                        <x-cards.skills :skills="$Portfolio->skills" />
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                    <h6>Hourly Rate</h6>
                    <div class="d-flex flex-row align-items-center mb-1">
                        <p class="mb-1 me-1">Rs : <span class="text-success">{{ $Portfolio->hourly_rate }}</span></p>
                    </div>
                </div>
                <div class="d-flex flex-column mt-4">
                    <a href="/employer/labour/{{ $Portfolio->id }}" class="btn btn-primary btn-sm">Details</a>
                </div>
            </div>
        </div>
    </div>
</section> --}}


<div class="row">
    <div class="col-xl-4 col-md-12 mb-4">
        <div class="card">
            <div class="card-body d-flex flex-row">
                <img src="{{ asset('/images/user.jpg') }}" class="rounded-circle me-3" height="50px" width="50px"
                    alt="avatar" />
                <div>
                    <h5 class="card-title font-weight-bold mb-2">{{ $Portfolio->name }}</h5>
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
                <p class="card-text collapse" id="collapseContent">
                    Skills :
                    <x-cards.skills :skills="$Portfolio->skills" /><br />
                    Hourly Rate : Rs&nbsp;<span class="text-success">{{ $Portfolio->hourly_rate }}</span>
                </p>
                <div class="d-flex justify-content-between">
                    <a class="btn btn-link link-danger p-md-1 my-1" data-mdb-toggle="collapse" href="#collapseContent"
                        role="button" aria-expanded="false" aria-controls="collapseContent">Read more</a>
                    <div>
                        <a href="/employer/labour/{{ $Portfolio->id }}" class="btn btn-primary btn-sm">Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
