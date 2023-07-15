@extends('layouts.main')
@php
$rating_by = 'Labour';
$rate = 'Employer';

@endphp
@section('content')
<section>
    <h2 class="text text-center text-primary py-5 mt-5">MY JOBS</h2>
    <div class="container">
        <div class="row row-cols-1 row-cols-3 g-3">
            @foreach ($jobs as $job)
            @php
            $emp_rating = false;
            $lab_rating = false;
            @endphp
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset('images/job-done.png')}}" class="card-img-top" alt="Job Done" />
                    <div class="card-body">
                        <h5 class="card-title">Job : <span class="text-primary"> {{$job->GetJob->title }}</span></h5>
                        <p class="card-text">Location :<span class="text-danger">{{ $job->GetJob->location }}</span><br />
                            <hr />
                            Employer : <span
                                class="text-success">{{ $job->GetJob->GetEmployer->name }}</span><br />
                            Approved Bid : <span class="text-danger">{{ $job->GetApprovedBid->bid }}</span><br />
                            Job Status : <span class="text-info">{{ $job->status }}</span><br />
                            <span class="text-primary">Rating By Employer</span>

                            @if ($job->status == 'Completed')
                            @foreach ($job->GetRatings as $rating)
                            @if ($rating->rating_by == 'Employer')
                            @php
                            $emp_rating = true;
                            @endphp
                            @for ($i = 0; $i < $rating->ratings; $i++)
                                <i class="fa fa-star text-danger"></i>
                                @endfor
                                @endif
                                @if ($rating->rating_by == 'Labour')
                                @php
                                $lab_rating = true;
                                @endphp
                                @endif
                                @endforeach
                                @if (!$emp_rating)
                                Not Rated Yet
                                @endif
                                @endif
                                
                        </p>
                    </div>
                    <div class="card-footer">
                        @if ($job->status == 'Completed' && $lab_rating)
                        <a class="btn btn-success btn-sm disabled">Completed</a>
                        @elseif($job->status == 'Pending')
                        <a href="{{ url('/labour/job/complete') }}/{{ $job->GetJob->id }}" class="btn btn-danger btn-sm">
                            Pending
                        </a>
                        @else
                        <a type="button" class="btn btn-info btn-sm rateModalBtn" data-jobid="{{ $job->id }}"
                            data-ratedid="{{ $job->GetJob->employer_id }}">
                            Rate Employer
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
    
        </div>
    </div>



</section>
<x-modals.rating :rating_by="$rating_by" :rate="$rate" />
@endsection
<script type="text/javascript" src="{{ asset('/lib/js/jquery-3.4.1.min.js') }}"></script>
<script>
$(document).ready(function() {
    $('.rateModalBtn').click(function(e) {
        var jobid = $(this).data('jobid');
        var ratedid = $(this).data('ratedid');
        $('#ratedid').val(ratedid);
        $('#assigned_job_id').val(jobid);
        $('#ratingModal').modal('show');
    });
});
</script>