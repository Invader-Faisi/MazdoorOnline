@extends('layouts.main')

@section('content')
<section style="background-color: #eee;">
    <div class="container pt-5 my-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <h3 class="fw-bold text-primary py-5">Portfolio</h3>
                        <form method="POST" action="{{url('/labour/portfolio/create')}}" id="portfolio">
                            @csrf
                            <!-- Name input -->
                            <div class="form-group">
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="Portfolio Title" />
                            </div>
                            <p class="text-danger">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </p>
                            <!-- Experience input -->
                            <div class="form-group">
                                <input type="number" id="experience" name="experience" min="1" class="form-control"
                                    placeholder="Experience (Years)" />
                            </div>
                            <p class="text-danger">
                                @error('experience')
                                {{ $message }}
                                @enderror
                            </p>
                            <!-- Skills input -->
                            <div class="form-group">
                                <input type="text" id="skills" name="skills" class="form-control"
                                    placeholder="Enter Skills [ Hypen(-) separated ]" />
                            </div>
                            <p class="text-danger">
                                @error('skills')
                                {{ $message }}
                                @enderror
                            </p>
                            <!-- Hourly Rate input -->
                            <div class="form-group">
                                <input type="text" id="hourly_rate" name="hourly_rate" class="form-control"
                                    placeholder="Hourly Rate" />
                            </div>
                            <p class="text-danger">
                                @error('hourly_rate')
                                {{ $message }}
                                @enderror
                            </p>
                            <!-- Submit button -->
                            <input type="submit" class="btn btn-primary btn-block mb-4" id="submit" value="Create" />
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="rounded-top text-white d-flex flex-row"
                        style="background: rgb(34,193,195); height:200px;">
                        <div class="ms-5 mt-3 d-flex flex-column" style="width: 200px;">
                            <img src="{{ asset('/images/user.jpg') }}" alt="image"
                                class="img-fluid img-thumbnail mt-2 mb-2" style="width: 200px; z-index: 1">
                            <div class="small text-muted mb-0 ms-5" style="z-index: 1">
                                @if ($ratings != null)
                                @for ($i = 0; $i < $ratings; $i++) <i class="fa fa-star text-danger"></i>
                                    @endfor
                                    @endif

                            </div>
                        </div>
                        <div class="ms-3" style="margin-top: 130px;">
                            <h5>{{$labour->name}}</h5>
                            <p>{{$labour->address}}</p>
                        </div>
                    </div>
                    <div class="p-4 text-black" style="background-color: #f8f9fa;">
                        @if ($labour->GetPortfolio != null)
                        <div class="d-flex justify-content-end text-center py-1">
                            <button type="button" class="btn btn-outline-primary edit">
                                Update Portfolio
                            </button>
                        </div>
                        @endif
                    </div>
                    <div class="card-body p-2 text-black">
                        <div class="mb-1">
                            <p class="lead fw-bold mb-2 text-center">Details</p>
                            <div class="p-2" style="background-color: #eee;">
                                <table class="table align-middle mb-0 bg-white">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Portfolio Title</th>
                                            <th>Skills</th>
                                            <th>Rate</th>
                                            <th>Experience</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    @if ($labour->GetPortfolio != null)

                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="fw-bold mb-1">{{ $labour->GetPortfolio->name }}</p>
                                            </td>
                                            <td>
                                                <x-cards.skills :skills="$labour->GetPortfolio->skills" />
                                            </td>
                                            <td>
                                                Rs :&nbsp;{{ $labour->GetPortfolio->hourly_rate }} / hr
                                            </td>
                                            <td>
                                                {{ $labour->GetPortfolio->experience }}&nbsp;Years
                                            </td>
                                            <td>
                                                @if ($labour->GetPortfolio->status == 'Pending')
                                                <span
                                                    class="badge badge-warning rounded-pill d-inline">{{ $labour->GetPortfolio->status }}</span>
                                                @else
                                                <span
                                                    class="badge badge-success rounded-pill d-inline">{{ $labour->GetPortfolio->status }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@if ($labour->GetPortfolio != null)
<script type="text/javascript" src="{{ asset('/lib/js/jquery-3.4.1.min.js') }}"></script>
<script>
$(document).ready(function() {
    $('.edit').click(function(e) {
        var id = $('#id');
        $('#portfolio').attr('action',
            '{{url("/labour/portfolio/update")}}/{{$labour->GetPortfolio->id}}')
        $('#name').val('{{$labour->GetPortfolio->name}}');
        $('#experience').val('{{$labour->GetPortfolio->experience}}');
        $('#skills').val('{{$labour->GetPortfolio->skills}}');
        $('#hourly_rate').val('{{$labour->GetPortfolio->hourly_rate}}');
        $('#submit').val('Update');
    });
});
</script>
@endif