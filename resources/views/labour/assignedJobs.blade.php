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
                                        <th scope="col" class="fw-bold">Ratings</th>
                                        <th scope="col" class="fw-bold">Status</th>
                                        <th scope="col" class="fw-bold">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $job)
                                    <tr>
                                        <th scope="row">
                                            <i class="fas fa-headset text-info"></i>
                                        </th>
                                        <td>{{ $job->GetJob->title }}</td>
                                        <td>{{ $job->GetJob->location }}</td>
                                        <td>{{ $job->GetJob->GetEmployer->name }}</td>
                                        <td>{{ $job->GetJob->GetBid->bid }}</td>
                                        <td>
                                            @if ($job->GetJob->GetEmployer->GetRating->rating_by != 'Labour')
                                            Not Rated Yet
                                            @else
                                            <div class="text-danger me-2" style="font-size:12px">
                                                @for ($i = 0; $i < $job->GetJob->GetEmployer->GetRating->ratings; $i++)
                                                    <i class="fa fa-star"></i>
                                                    @endfor
                                            </div>
                                            @endif
                                        </td>
                                        <td>{{ $job->GetJob->GetAssignedLabour->status }}</td>
                                        <td>
                                            @if ($job->GetJob->GetAssignedLabour->status == 'Completed')
                                            @if ($job->GetJob->GetEmployer->GetRating->rating_by != 'Labour')
                                            <a type="button" class="btn btn-success btn-sm px-3 rateModalBtn" data-id="{{ $job->GetJob->employer_id }}" data-jobid="{{ $job->GetJob->id }}">
                                                <i class="fas fa-check text-white"></i>
                                            </a>
                                            @else
                                            <a type="button" class="btn btn-success btn-sm px-3 disabled">
                                                <i class="fas fa-check text-white"></i>
                                            </a>
                                            @endif
                                            @else
                                            <a type="button" class="btn btn-info btn-sm px-3">
                                                <i class="fas fa-question text-white"></i>
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
            var ratedid = $(this).data('id');
            var jobid = $(this).data('jobid');
            $('#ratedid').val(ratedid);
            $('#assigned_job_id').val(jobid);
            $('#ratingModal').modal('show');
        });
    });
</script>