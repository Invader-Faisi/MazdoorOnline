@props(['Job'])

<div class="row">
    <div class="col-xl-4 col-md-12 mb-4">
        <div class="card">
            <div class="card-body d-flex flex-row">
                <img src="{{ asset('/images/user.jpg') }}" class="rounded-circle me-3" height="50px" width="50px"
                    alt="avatar" />
                <div>
                    <h5 class="card-title font-weight-bold mb-2">{{ $Job->title }}</h5>
                    <div class="d-flex flex-row">
                        <p style="font-size: 12px">Employer Rating :</p>
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

                    Offer : <span class="fw-bold text-success">{{ $Job->rate }}</span><br />
                    Location : <span class="fw-bold text-success">{{ $Job->location }}</span><br />
                    <span class="text-muted">{{ $Job->description }}</span>

                </p>
                <div class="d-flex justify-content-between">
                    <a class="btn btn-link link-danger p-md-1 my-1" data-mdb-toggle="collapse" href="#collapseContent"
                        role="button" aria-expanded="false" aria-controls="collapseContent">Read more</a>
                    <div>
                        <a href="/labour/job/{{ $Job->id }}" class="btn btn-primary btn-sm">Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
