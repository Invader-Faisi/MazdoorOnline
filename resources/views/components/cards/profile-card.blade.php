@props(['profile','ratings'])

<div class="row">
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-body text-center">
                <img src="{{ asset('images/user.jpg') }}" alt="avatar" class="rounded-circle img-fluid"
                    style="width: 150px;">
                <h5 class="my-3">{{ $profile->name }}</h5>
                <p class="text-muted mb-1">{{ $profile->email }}</p>
                <p class="text-muted mb-1">{{ $profile->contact }}</p>
                @if ($ratings != null)
                @for ($i = 0; $i < $ratings; $i++) <i class="fa fa-star text-danger"></i>
                    @endfor
                    @endif
                    <div class="d-flex justify-content-center mt-2 mb-2">
                        <button type="button" class="btn btn-primary" data-mdb-toggle="modal"
                            data-mdb-target="#profileModal">Update Profile</button>
                    </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $profile->name }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $profile->email }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Address</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $profile->address }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Mobile</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $profile->contact }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Password</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">**********</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>