@extends('layouts.main')

@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5 mt-5">
            @if (session()->has('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif
            <div class="card col-8 mx-auto">
                <img src="{{ asset('images/jobs.jpg') }}" height="300px" class="card-img-top" alt="Wild Landscape" />
                <div class="card-body">
                    <h5 class="card-title">
                        Labour :&nbsp;<span class="text-success">{{ $portfolio->name }}</span>
                        <br />
                        Portfolio Title :&nbsp;<span class="text-danger">{{ $portfolio->name }}</span>
                    </h5>
                    <hr>
                    <p class="card-text">
                        <b>Hourly Rate :</b>&nbsp;
                        <span class="badge badge-success rounded-pill d-inline">
                            Rs : {{ $portfolio->hourly_rate }}
                        </span>&nbsp;
                        <b>Skills:</b>&nbsp;
                        <x-cards.skills :skills="$portfolio->skills" />
                        <b>Experience:</b>&nbsp;
                        <span class="badge badge-danger rounded-pill d-inline">
                            {{ $portfolio->experience }} Years
                        </span>&nbsp;
                    </p>
                    <button class="btn btn-primary btn-sm" data-mdb-toggle="modal" data-mdb-target="#rateModal">
                        Rate Labour</button>
                    <button class="btn btn-success btn-sm"> Assign Job</button>

                </div>
            </div>
        </div>
    </section>
    @php
        $rating_by = 'Employer';
        $rate = 'Labour';
    @endphp
    <x-modals.rating :ratedid="$portfolio->labour_id" :rating_by="$rating_by" :rate="$rate" />
@endsection
