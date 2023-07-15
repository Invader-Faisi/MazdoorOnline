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
            <div class="container-fluid d-flex flex-wrap justify-content-between">              
                @foreach ($jobs as $job)
                    <div class="overflow-auto mb-5" style="height: 320px;">
                        <div class="card m-2" style="max-width: 520px;">
                            <div class="card">
                                <img src="{{asset('/images/job.jpg')}}" height="200px" class="card-img-top"
                                    alt="JOB">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $job->title }}</h5>
                                    <p class="card-text">
                                        <p style="font-size: 12px">Type : {{ $job->category }}</p>
                                        <p style="font-size: 12px">Location :{{ $job->location }}</p>
                                        <p class="card-text">
                                            {{ $job->description }}
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted">Rate Type : {{ $job->rate }}</small>
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted">Rate : {{ $job->job_rate }}</small>
                                        </p>
                                        <p class="card-text">
                                            @if ($job->status == 'Pending')
                                            <span class="badge badge-warning rounded-pill d-inline">{{ $job->status }}</span>
                                            @elseif($job->status == 'Assigned')
                                            @foreach ($jobstatus as $status)
                                            @if ($status->job_id == $job->id && $status->status == 'Completed')
                                            <span class="badge badge-success rounded-pill d-inline">Job Completed</span>
                                            @endif
                                            @endforeach
                                            @else
                                            <span class="badge badge-success rounded-pill d-inline">{{ $job->status }}</span>
                                            @endif
                                        </p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>                   
                @endforeach
            </div>
        </div>
    </div>
</section> 
@endsection

