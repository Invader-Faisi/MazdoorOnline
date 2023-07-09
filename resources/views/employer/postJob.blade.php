@extends('layouts.main')

@section('content')
<section>
    <div class="container-fluid d-flex pt-5 my-5">
        <div class="col-4">
            <h5 class="text-center text-bold text-primary">Post your Job</h5>
            <div class="container col-10 mt-3">
                <form method="POST" action="{{ url('/employer/job') }}">
                    @csrf
        
                    <div class="form-group">
                        <label for="gender">Company</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="{{ old('category') }}">{{ old('category') }}</option>
                            <option value="Individual">Individual</option>
                            <option value="Corporate">Corporate</option>
                        </select>
                        <p class="text-danger">
                            @error('category')
                            {{ $message }}
                            @enderror
                        </p>
                    </div>
        
                    <div class="form-group">
                        <label for="gender">Category</label>
                        <select class="form-control" id="title" name="title" required>
                            <option value="{{ old('title') }}">{{ old('title') }}</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->category}}">{{$category->category}}</option>
                            @endforeach
                        </select>
                        <p class="text-danger">
                            @error('title')
                            {{ $message }}
                            @enderror
                        </p>
                    </div>
        
                    <div class="form-group">
                        <label for="gender">Offer</label>
                        <select class="form-control" id="rate" name="rate" required>
                            <option value="{{ old('rate') }}">{{ old('rate') }}</option>
                            <option value="Fixed">Fixed</option>
                            <option value="Bid">Bid</option>
                        </select>
                        <p class="text-danger">
                            @error('rate')
                            {{ $message }}
                            @enderror
                        </p>
                    </div>
        
        
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location" placeholder="Location"
                            value="{{ old('location') }}" required />
                        <p class="text-danger">
                            @error('location')
                            {{ $message }}
                            @enderror
                        </p>
                    </div>
        
                    <div class="form-group">
                        <label for="job_rate">Job Rate</label>
                        <input type="text" class="form-control" id="job_rate" name="job_rate" placeholder="Job Rate (Rs)"
                            value="{{ old('job_rate') }}" required />
                        <p class="text-danger">
                            @error('job_rate')
                            {{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="6"
                            value="{{ old('description') }}" required></textarea>
        
                        <p class="text-danger">
                            @error('description')
                            {{ $message }}
                            @enderror
                        </p>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>

        <div class="col-8 border-start border-danger border-2">
            <h5 class="text-center text-bold text-primary">Your Jobs</h5>
            <div class="container-fluid col-11 mt-4">
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

