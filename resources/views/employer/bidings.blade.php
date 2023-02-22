@extends('layouts.main')

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
                                            <i class="fas fa-university fa-lg text-success"></i>
                                        </th>
                                        <th scope="col" class="fw-bold">Job</th>
                                        <th scope="col" class="fw-bold">Location</th>
                                        <th scope="col" class="fw-bold">Applicant</th>
                                        <th scope="col" class="fw-bold">Bid</th>
                                        <th scope="col" class="fw-bold">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $job)
                                    @if ($job->status == 'Approved')
                                    @foreach ($job->GetBidings as $bid)
                                    <tr>
                                        <th scope="row">
                                            <i class="fab fa-snapchat-square fa-lg text-info"></i>
                                        </th>
                                        <td>{{ $job->title }}</td>
                                        <td>{{ $job->location }}</td>
                                        <td>{{ $bid->GetBider->name }}</td>
                                        <td>{{ $bid->bid }}</td>
                                        <td>
                                            <a type="button" class="btn btn-success btn-sm px-3"
                                                href="{{ url('/employer/labour') }}/{{ $bid->GetBider->GetPortfolio->id }}/{{ $job->id }}/{{ $bid->id }}">
                                                <i class="fas fa-check"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
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