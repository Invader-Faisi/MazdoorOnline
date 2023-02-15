@extends('layouts.main')

@section('content')
    @if (!session()->has('user_type'))
        <!-- Hero section is only avaiable on main page -->
        <x-hero />
        <!-- /hero section -->
    @endif



    <h3 class="text-center py-4">
        <small class="text-muted"><u>AVAILABLE LABOURS & JOBS</u></small>
    </h3>

    <div class="container">
        <section>
            <div class="row">
                <div class="col-12 mt-3 mb-1">
                    <h5 class="text-uppercase">portfolios</h5>
                </div>
            </div>
            @foreach ($portfolios as $portfolio)
                <x-cards.labour-card :Portfolio="$portfolio" />
            @endforeach
            <hr />
            <div class="row">
                <div class="col-12 mt-3 mb-1">
                    <h5 class="text-uppercase">jobs</h5>
                </div>
            </div>
            @foreach ($jobs as $job)
                <x-cards.job-card :Job="$job" />
            @endforeach
        </section>
    </div>
    {{-- <div class="container">
            <div class="row">
            <div class="col-md">
                <h5 class="text-center py-2">
                    <small class="text-muted"><u>LABOURS</u></small>
                </h5>
                @foreach ($portfolios as $portfolio)
                    <x-cards.labour-card :Portfolio="$portfolio" />
                @endforeach

            </div>
            <div class="col-md">
                <h5 class="text-center py-2">
                    <small class="text-muted"><u>JOBS</u></small>
                </h5>
                @foreach ($jobs as $job)
                    <x-cards.job-card :Job="$job" />
                @endforeach
            </div>
        </div>
        <div class="pagination col-4 my-2 p-2 mx-auto">
            {{ $jobs->links() }}
        </div> 
    </div> --}}
@endsection
