@extends('layouts.main')

@section('content')
<section>    
    <div class="container py-5 mt-5">
        <div class="row">
            <div class="col-md">
                <h5 class="text-center py-2">
                    <small class="text-muted"><u>AVAILABLE PORTFOLIOS</u></small>
                </h5>
                @foreach ($portfolios as $portfolio)
                <x-cards.labour-card :Portfolio="$portfolio" :lab_rating="$portfolio->GetLabour" />
                @endforeach
            </div>
        </div>
        <div class="pagination col-4 my-2 p-2 mx-auto">
            {{ $portfolios->links() }}
        </div>
    </div>
</section>
@endsection