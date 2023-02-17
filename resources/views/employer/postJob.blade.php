@extends('layouts.main')

@section('content')
    <section>
        <div class="container-fluid pt-5 my-5">
            <div class="row px-5">
                <h5 class="text-center text-bold text-primary"><u>Post your
                        Job</u></h5>
                <form class="row row-cols-lg-auto g-3 align-items-center" method="POST" action="{{ url('/employer/job') }}">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="input-group">
                                <div class="input-group-text">Category</div>
                                <select class="select col-9" id="category" name="category">
                                    <option value="{{ old('category') }}"></option>
                                    <option value="Individual">Individual</option>
                                    <option value="Corporate">Corporate</option>
                                </select>
                            </div>
                            <p class="text-danger">
                                @error('category')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="col-4">
                            <div class="input-group">
                                <div class="input-group-text">Title</div>
                                <select class="select col-10" id="title" name="title">
                                    <option value="{{ old('title') }}"></option>
                                    <option value="Driver">Driver</option>
                                    <option value="Carpenter">Carpenter</option>
                                    <option value="Contractor">Contractor</option>
                                </select>
                            </div>
                            <p class="text-danger">
                                @error('category')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="col-4">
                            <div class="input-group">
                                <div class="input-group-text">Offer</div>
                                <select class="select col-10" id="rate" name="rate">
                                    <option value="{{ old('rate') }}"></option>
                                    <option value="Fixed">Fixed</option>
                                    <option value="Bid">Bid</option>
                                </select>
                            </div>
                            <p class="text-danger">
                                @error('rate')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <div class="input-group-text">Location</div>
                                <input type="text" class="form-control" id="location" name="location"
                                    placeholder="Location" value="{{ old('location') }}" />
                            </div>
                            <p class="text-danger">
                                @error('location')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="col-6">
                            <div class="input-group">
                                <div class="input-group-text">Job Rate</div>
                                <input type="text" class="form-control" id="job_rate" name="job_rate"
                                    placeholder="Job Rate (Rs)" value="{{ old('job_rate') }}" />
                            </div>
                            <p class="text-danger">
                                @error('job_rate')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="col-8">
                            <div class="input-group">
                                <div class="input-group-text">Description</div>
                                <textarea class="form-control" id="description" name="description" rows="2" value="{{ old('description') }}"></textarea>
                            </div>
                            <p class="text-danger">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

            <hr />
            <div class="row">
                <h5 class="text-center text-bold text-primary"><u>You Jobs</u></h5>
                <div class="col-12">
                    <div class="card shadow-2-strong" style="background-color: #f5f7fa;">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                <i class="fas fa-university fa-lg text-success"></i>
                                            </th>
                                            <th scope="col" class="fw-bold">Company</th>
                                            <th scope="col" class="fw-bold">Job</th>
                                            <th scope="col" class="fw-bold">Location</th>
                                            <th scope="col" class="fw-bold">Offer</th>
                                            <th scope="col" class="fw-bold">Rate</th>
                                            <th scope="col" class="fw-bold">Description</th>
                                            <th scope="col" class="fw-bold">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jobs as $job)
                                            @if ($job->status == 'Assigned')
                                                <tr>
                                                    <th scope="row">
                                                        <i class="fab fa-snapchat-square fa-lg text-info"></i>
                                                    </th>
                                                    <td>{{ $job->category }}</td>
                                                    <td>{{ $job->title }}</td>
                                                    <td>{{ $job->location }}</td>
                                                    <td>{{ $job->rate }}</td>
                                                    <td>{{ $job->job_rate }}</td>
                                                    <td>{{ $job->description }}</td>
                                                    <td>
                                                        @if ($job->status == 'Pending')
                                                            <span
                                                                class="badge badge-warning rounded-pill d-inline">{{ $job->status }}</span>
                                                        @else
                                                            <span
                                                                class="badge badge-success rounded-pill d-inline">{{ $job->status }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
