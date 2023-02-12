@extends('layouts.main')

@section('content')
    <section style="background-color: #eee;">
        <div class="container pt-5 my-5">
            <h1 class="text-center text-bold text-primary"><u>Jobs</u></h1>
            <section class="mx-auto pt-5" style="max-width: 35rem;">
                <form>
                    <div class="row align-items-center">
                        <div class="col">
                            <!-- Category input -->
                            <label class="form-check-label" for="category">Category&nbsp;&nbsp;</label>
                            <select class="select col-6" id="category" name="category">
                                <option value=""></option>
                                <option value="Individual">Individual</option>
                                <option value="Corporate">Corporate</option>
                            </select>
                        </div>
                        <div class="col">
                            <!-- Work Category input -->
                            <label class="form-check-label" for="title">Title&nbsp;&nbsp;</label>
                            <select class="select col-8" id="title" name="title">
                                <option value=""></option>
                                <option value="Individual">Individual</option>
                                <option value="Corporate">Corporate</option>
                            </select>
                        </div>

                        <div class="col">
                            <!-- Location input -->
                            <div class="form-outline">
                                <input type="text" id="location" name="location" class="form-control" />
                                <label class="form-label" for="location">Location</label>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div class="row align-items-center">
                        <div class="col">
                            <!-- Offer input -->
                            <label class="form-check-label" for="offer">Offer&nbsp;&nbsp;</label>
                            <select class="select col-8" id="offer" name="rate">
                                <option value=""></option>
                                <option value="Fixed">Fixed</option>
                                <option value="Bid">Bid</option>
                            </select>
                        </div>
                        <div class="col">
                            <!-- Job Rate input -->
                            <div class="form-outline">
                                <input type="number" id="job_rate" name="job_rate" class="form-control" min="0" />
                                <label class="form-label" for="job_rate">Job Rate</label>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div class="row align-items-center">
                        <div class="col">
                            <!-- Description input -->
                            <div class="form-outline">
                                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                                <label class="form-label" for="description">Description</label>
                            </div>
                        </div>
                    </div>

                    <hr />
                    <div class="row">
                        <div class="col">
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
                        </div>
                    </div>
                </form>
            </section>
        </div>

        <div class="container-fluid pb-5">
            <hr />
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Offer</th>
                        <th>Rate</th>
                        <th>Description</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                        <tr>
                            <td><span class="badge badge-success rounded-pill d-inline">{{ $job->category }}</span></td>
                            <td>
                                <p class="fw-bold mb-1">{{ $job->title }}</p>
                            </td>
                            <td>
                                <span class="badge badge-info rounded-pill d-inline">{{ $job->location }}</span>
                            </td>
                            <td>
                                {{ $job->rate }}
                            </td>
                            <td>
                                {{ $job->job_rate }}
                            </td>
                            <td>
                                {{ $job->description }}
                            </td>
                            <td>
                                @if ($job->status == 'Pending')
                                    <span class="badge badge-warning rounded-pill d-inline">{{ $job->status }}</span>
                                @else
                                    <span class="badge badge-success rounded-pill d-inline">{{ $job->status }}</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
