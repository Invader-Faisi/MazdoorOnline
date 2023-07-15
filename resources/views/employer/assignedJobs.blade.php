@extends('layouts.main')
@php
$rating_by = 'Employer';
$rate = 'Labour';
@endphp
@section('content')
<section>
    <h2 class="text text-center text-primary py-5 mt-5">Assigned Jobs</h2>
    <div class="container">
    <div class="row row-cols-1 row-cols-3 g-3">        
            @foreach ($jobs as $job)
            @if ($job->status == 'Assigned')
            @php
            $emp_rating = false;
            $lab_rating = false;
            @endphp
            <div class="col">
            <div class="card h-100">
                <img src="{{asset('images/job-done.png')}}" class="card-img-top" alt="Job Done" />
                <div class="card-body">
                    <h5 class="card-title">Job : <span class="text-primary"> {{$job->title }}</span></h5>
                    <hr/>
                    <p class="card-text">{{ $job->description }}<br/>
                        <hr />
                        Job Holder : <span class="text-success">{{ $job->GetAssignedLabour->GetLabour->name }}</span><br />
                        Bid : <span class="text-danger">{{ $job->GetAssignedLabour->GetApprovedBid->bid }}</span><br />
                        Job Status : <span class="text-info">{{ $job->GetAssignedLabour->status }}</span><br />
                        <span class="text-primary">Rating By Labour</span>
                        @if ($job->GetAssignedLabour->status == 'Completed')
                        @foreach ($job->GetAssignedLabour->GetRatings as $rating)
                        @if ($rating->rating_by == 'Labour')
                        @php
                        $lab_rating = true;
                        @endphp
                        @for ($i = 0; $i < $rating->ratings; $i++)
                            <i class="fa fa-star text-danger"></i>
                            @endfor
                            @endif
                            @if ($rating->rating_by == 'Employer')
                            @php
                            $emp_rating = true;
                            @endphp
                            @endif
                            @endforeach
                            @if (!$lab_rating)
                            Not Rated Yet
                            @endif
                            @endif
                    </p>
                </div>
                <div class="card-footer">
                    @if ($job->GetAssignedLabour->status == 'Completed' && $emp_rating)
                        <a class="btn btn-success disabled">Completed</a>
                    @elseif($job->GetAssignedLabour->status == 'Pending')
                        <a class="btn btn-danger disabled">Pending</a>
                    @else
                    <a type="button" class="btn btn-info btn-sm px-3 rateModalBtn" data-jobid="{{ $job->GetAssignedLabour->id }}"
                        data-ratedid="{{ $job->GetAssignedLabour->GetLabour->id }}">
                        Rate Labour
                    </a>
                    @endif
                </div>
            </div>
            </div>
            @endif
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