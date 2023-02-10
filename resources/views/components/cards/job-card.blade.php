@props(['Job'])
<section class="mx-auto my-2" style="max-width: 35rem; background-color: #fcf7f7;">
    <div class="card shadow-0 border rounded-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 bg-image hover-zoom ripple rounded ripple-surface">
                    <img src="{{ asset('images/employer.jpg') }}" alt="Jobs" class="img-fluid rounded-start" />
                </div>
                <div class="col-md-8">
                    <h5>{{ $Job->title }}</h5>
                    <p>Location :<span class="text-bold text-success"> {{ $Job->location }} </span>
                    </p>
                    <p>Job Rate :<span class="text-bold text-danger"> {{ $Job->rate }} </span>
                    </p>
                    <p class="card-text text-muted">{{ $Job->description }} </span>
                    </p>
                </div>
            </div>
            <div class="d-flex flex-column">
                <button class="btn btn-primary btn-sm" type="button">Details</button>
            </div>
        </div>
    </div>
</section>
