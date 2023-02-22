@extends('layouts.main')
@php
$rating_by = 'Employer';
$rate = 'Labour';
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
                                        <th scope="col" class="fw-bold">Description</th>
                                        <th scope="col" class="fw-bold">Job Holder</th>
                                        <th scope="col" class="fw-bold">Placed Bid</th>
                                        <th scope="col" class="fw-bold">Status</th>
                                        <th scope="col" class="fw-bold">Labour Rating</th>
                                        <th scope="col" class="fw-bold">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $job)
                                    @if ($job->status == 'Assigned')
                                    @php
                                    $emp_rating = false;
                                    $lab_rating = false;
                                    @endphp
                                    <tr>
                                        <th scope="row">
                                            <i class="fas fa-headset text-info"></i>
                                        </th>
                                        <td>{{ $job->title }}</td>
                                        <td>{{ $job->description }}</td>
                                        <td>{{ $job->GetAssignedLabour->GetLabour->name }}</td>
                                        <td>{{ $job->GetAssignedLabour->GetApprovedBid->bid }}</td>
                                        <td>{{ $job->GetAssignedLabour->status }}</td>
                                        <td>
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

                                        </td>
                                        <td>
                                            @if ($job->GetAssignedLabour->status == 'Completed' && $emp_rating)
                                            <i class="fas fa-check text-success"></i>
                                            @elseif($job->GetAssignedLabour->status == 'Pending')
                                            <a type="button" class="btn btn-success btn-sm px-3 disabled">
                                                <i class="fas fa-question text-white"></i>
                                            </a>
                                            @else
                                            <a type="button" class="btn btn-info btn-sm px-3 rateModalBtn"
                                                data-jobid="{{ $job->GetAssignedLabour->job_id }}"
                                                data-ratedid="{{ $job->GetAssignedLabour->GetLabour->id }}">
                                                Rate
                                            </a>
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