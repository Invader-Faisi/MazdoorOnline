@extends('layouts.main')

@section('content')
<section style="background-color: #eee;">
    <div class="container py-5 mt-5">
        <div class="row">
            <div class="col-md">
                <h5 class="text-center py-2">
                    <small class="text-muted"><u>AVAILABLE PORTFOLIOS</u></small>
                </h5>
                @foreach ($portfolios as $portfolio)
                <x-cards.labour-card :Portfolio="$portfolio" />
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection