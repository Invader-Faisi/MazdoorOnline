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
                @for ($i = 0; $i < 3; $i++)
                    <x-card />
                @endfor
            </div>
            <div class="col-md">
                <h5 class="text-center py-2">
                    <small class="text-muted"><u>JOBS</u></small>
                </h5>
                @for ($i = 0; $i < 3; $i++)
                    <x-card />
                @endfor
            </div>
        </div>
    </div>
@endsection
