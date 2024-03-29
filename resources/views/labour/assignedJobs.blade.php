@extends('layouts.main')
@php
$rating_by = 'Labour';
$rate = 'Employer';

@endphp
@section('content')
<section style="background-color: #eee;">
    <div class="container-fluid py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow-2-strong" style="background-color: #f5f7fa;">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <i class="fas fa-university text-danger"></i>
                                        </th>
                                        <th scope="col" class="fw-bold">Job</th>
                                        <th scope="col" class="fw-bold">Location</th>
                                        <th scope="col" class="fw-bold">Employer</th>
                                        <th scope="col" class="fw-bold">Approved Bid</th>
                                        <th scope="col" class="fw-bold">Status</th>
                                        <th scope="col" class="fw-bold">Employer Rating</th>
                                        <th scope="col" class="fw-bold">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $job)
                                    @php
                                    $emp_rating = false;
                                    $lab_rating = false;
                                    @endphp
                                    <tr>
                                        <th scope="row">
                                            <i class="fas fa-headset text-info"></i>
                                        </th>
                                        <td>{{ $job->GetJob->title }}</td>
                                        <td>{{ $job->GetJob->location }}</td>
                                        <td>{{ $job->GetJob->GetEmployer->name }}</td>
                                        <td>{{ $job->GetApprovedBid->bid }}</td>
                                        <td>{{ $job->status }}</td>
                                        <td>
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
                                        </td>
                                        <td>
                                            @if ($job->status == 'Completed' && $lab_rating)
                                            <i class="fas fa-check text-success"></i>
                                            @elseif($job->status == 'Pending')
                                            <a href="{{ url('/labour/job/complete') }}/{{ $job->GetJob->id }}"
                                                class="btn btn-success btn-sm px-3">
                                                <i class="fas fa-check text-white"></i>
                                            </a>
                                            @else
                                            <a type="button" class="btn btn-info btn-sm rateModalBtn"
                                                data-jobid="{{ $job->id }}"
                                                data-ratedid="{{ $job->GetJob->employer_id }}">
                                                Rate
                                            </a>
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