@extends('layouts.main')

@section('content')
    <!-- Hero section is only avaiable on main page -->
    <x-hero />
    <!-- /hero section -->


    <h3 class="text-center py-4">
        <small class="text-muted"><u>AVAILABLE LABOURS & JOBS</u></small>
    </h3>
    <div class="container">
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
    </div>
@endsection
