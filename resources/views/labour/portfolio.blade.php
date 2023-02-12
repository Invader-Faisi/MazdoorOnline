@extends('layouts.main')

@section('content')
    <section style="background-color: #eee;">
        <div class="container pt-5 my-5">
            <h1 class="text-center text-bold text-primary"><u>Portfolios</u></h1>
            <section class="mx-auto pt-5" style="max-width: 35rem;">
                <form>
                    <div class="row">
                        <div class="col">
                            <!-- Name input -->
                            <div class="form-outline">
                                <input type="text" id="name" name="name" class="form-control" />
                                <label class="form-label" for="name">Name</label>
                            </div>
                        </div>
                        <div class="col">
                            <!-- Experience input -->
                            <div class="form-outline">
                                <input type="email" id="experience" name="experience" class="form-control" />
                                <label class="form-label" for="experience">Experience</label>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div class="row">
                        <div class="col">
                            <!-- Skills input -->
                            <div class="form-outline">
                                <input type="text" id="skills" name="skills" class="form-control" />
                                <label class="form-label" for="skills">Enter Skills (comma separated)</label>
                            </div>
                        </div>
                        <div class="col">
                            <!-- Hourly Rate input -->
                            <div class="form-outline">
                                <input type="text" id="hourly_rate" name="hourly_rate" class="form-control" />
                                <label class="form-label" for="hourly_rate">Hourly Rate</label>
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

        <div class="container pb-5">
            <hr />
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Portfolio Title</th>
                        <th>Skills</th>
                        <th>Hourly Rate</th>
                        <th>Experience</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($portfolios as $portfolio)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('/images/user.jpg') }}" alt="User"
                                        style="width: 45px; height: 45px" class="rounded-circle" />
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1">{{ $portfolio->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <x-cards.skills :skills="$portfolio->skills" />
                            </td>
                            <td>
                                Rs :&nbsp;{{ $portfolio->hourly_rate }}
                            </td>
                            <td>
                                {{ $portfolio->experience }}&nbsp;Years
                            </td>
                            <td>
                                @if ($portfolio->status == 'Pending')
                                    <span class="badge badge-warning rounded-pill d-inline">{{ $portfolio->status }}</span>
                                @else
                                    <span class="badge badge-success rounded-pill d-inline">{{ $portfolio->status }}</span>
                                @endif

                            </td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm btn-rounded">
                                    Post
                                </button>
                                <button type="button" class="btn btn-danger btn-sm btn-rounded">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
