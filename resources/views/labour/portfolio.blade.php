@extends('layouts.main')

@section('content')
<section style="background-color: #eee;">
    <div class="container pt-5 my-5">
        <h3 class="text-center text-bold text-primary"><u>Post your Portfolio</u></h3>
        <section class="mx-auto pt-5" style="max-width: 35rem;">
            <form method="POST" action="{{url('/labour/portfolio')}}">
                @csrf
                <div class="row">
                    <div class="col">
                        <!-- Name input -->
                        <div class="form-outline">
                            <input type="text" id="name" name="name" class="form-control" />
                            <label class="form-label" for="name">Portfolio Title</label>
                        </div>
                        <p class="text-danger">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div class="col">
                        <!-- Experience input -->
                        <div class="form-outline">
                            <input type="number" id="experience" name="experience" min="1" class="form-control" />
                            <label class="form-label" for="experience">Experience (Years)</label>
                        </div>
                        <p class="text-danger">
                            @error('experience')
                            {{ $message }}
                            @enderror
                        </p>
                    </div>
                </div>

                <hr />

                <div class="row">
                    <div class="col">
                        <!-- Skills input -->
                        <div class="form-outline">
                            <input type="text" id="skills" name="skills" class="form-control" />
                            <label class="form-label" for="skills">Enter Skills [ Hypen(-) separated ]</label>
                        </div>
                        <p class="text-danger">
                            @error('skills')
                            {{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div class="col">
                        <!-- Hourly Rate input -->
                        <div class="form-outline">
                            <input type="text" id="hourly_rate" name="hourly_rate" class="form-control" />
                            <label class="form-label" for="hourly_rate">Hourly Rate</label>
                        </div>
                        <p class="text-danger">
                            @error('hourly_rate')
                            {{ $message }}
                            @enderror
                        </p>
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
        <h5 class="text-center text-bold text-primary p-3"><u>Your Portfolios</u></h5>
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>Portfolio Title</th>
                    <th>Skills</th>
                    <th>Hourly Rate</th>
                    <th>Experience</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($portfolios as $portfolio)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('/images/user.jpg') }}" alt="User" style="width: 45px; height: 45px"
                                class="rounded-circle" />
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection