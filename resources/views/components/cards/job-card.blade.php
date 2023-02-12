@props(['Job'])
<section class="mx-auto my-2" style="max-width: 35rem;background-color: #fcf7f7;">
    <div class="card shadow-0 border rounded-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                    <div class="bg-image hover-zoom ripple rounded ripple-surface">
                        <img src="{{ asset('images/employer.jpg') }}" class="w-100" />
                        <a href="#!">
                            <div class="hover-overlay">
                                <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <h5 class="text-bold text-dark">{{ $Job->title }}</h5>
                    <div class="d-flex flex-row">
                        <p> Location : <span class="text-bold text-success">{{ $Job->location }}</span></p>
                    </div>
                    <div class="mt-1 mb-0 text-muted ">
                        <p> {{ $Job->description }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                    <div class="d-flex flex-row align-items-center mb-1">
                        <h4 class="mb-1 me-1">Offer</h4>
                        <span class="text-danger"></span>
                    </div>
                    <h6 class="text-success">{{ $Job->rate }}</h6>
                </div>
                <div class="d-flex flex-column mt-4">
                    <a href="/labour/job/{{ $Job->id }}" class="btn btn-primary btn-sm">Details</a>
                </div>
            </div>
        </div>
    </div>
</section>
