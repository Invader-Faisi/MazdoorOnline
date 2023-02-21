@extends('layouts.main')

@section('content')

<x-sidebar />

<!--Main layout-->
<div style="margin-top: 58px; margin-left:20px;" class="admin-main">
    <div class="container-fluid pt-4">
        <!-- Section: Main chart -->
        <section class="mb-4" id="dashboard-section">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="mb-0 text-center text-primary"><strong>Application State</strong></h5>
                </div>
                <div class="card-body">
                    <canvas class="my-4 w-100" id="myChart" height="380"></canvas>
                </div>
            </div>
        </section>
        <!-- Section: Main chart -->

        <!--Section: Category-->
        <section class="mb-4" id="category-section">
            <div class="card">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-0 text-primary">
                            <strong>Categories</strong>
                        </h5>
                        <button type="button" class="btn btn-sm btn-primary alig-right" data-mdb-toggle="modal"
                            data-mdb-target="#categoryModal">Add</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 col-12 mb-4">
                            <div class="card shadow-5-strong">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between px-md-1">
                                        <div class="align-self-center">
                                            <i class="fab fa-laravel text-info fa-3x"></i>
                                        </div>
                                        <div class="text-end my-auto">
                                            <p class="mb-0 fw-bold">Electrician</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Section: Category-->

        <!--Section: Employers-->
        <section class="mb-4" id="employer-section">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="mb-0 text-center text-primary"><strong>Employers</strong></h5>
                </div>
                <div class="card-body">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Address</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($employers as $employer)
                            <tr>
                                <td>
                                    <p class="fw-bold mb-1">{{$employer->name}}</p>
                                </td>
                                <td>
                                    <p class="fw-bold mb-1">{{$employer->email}}</p>
                                </td>
                                <td>
                                    <p class="fw-bold mb-1">{{$employer->contact}}</p>
                                </td>
                                <td>
                                    <p class="fw-bold mb-1">{{$employer->address}}</p>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!--Section: Employers-->

        <!--Section: Labours-->
        <section class="mb-4" id="labour-section">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="mb-0 text-center text-primary"><strong>Labours</strong></h5>
                </div>
                <div class="card-body">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Address</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($labours as $labour)
                            <tr>
                                <td>
                                    <p class="fw-bold mb-1">{{$labour->name}}</p>
                                </td>
                                <td>
                                    <p class="fw-bold mb-1">{{$labour->email}}</p>
                                </td>
                                <td>
                                    <p class="fw-bold mb-1">{{$labour->contact}}</p>
                                </td>
                                <td>
                                    <p class="fw-bold mb-1">{{$labour->address}}</p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!--Section: Labours-->

        <!--Section: Jobs-->
        <section class="mb-4" id="jobs-section">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="mb-0 text-center text-primary"><strong>Jobs</strong></h5>
                </div>
                <div class="card-body">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Company</th>
                                <th>Category</th>
                                <th>Loaction</th>
                                <th>Offer</th>
                                <th>Rate</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($jobs as $job)
                            <tr>
                                <td>
                                    <p class="fw-bold mb-1">{{$job->category}}</p>
                                </td>
                                <td>
                                    <p class="fw-bold mb-1">{{$job->title}}</p>
                                </td>
                                <td>
                                    <p class="fw-bold mb-1">{{$job->location}}</p>
                                </td>
                                <td>
                                    <p class="fw-bold mb-1">{{$job->rate}}</p>
                                </td>
                                <td>
                                    <p class="fw-bold mb-1">{{$job->job_rate}}</p>
                                </td>
                                <td>
                                    <p class="fw-bold mb-1">{{$job->description}}</p>
                                </td>
                                <td>
                                    @if ($job->status == 'Active' || $job->status == 'Assigned')
                                    <span class="badge badge-dark rounded-pill d-inline">{{$job->status}}</span>
                                    @else
                                    <span class="badge badge-warning rounded-pill d-inline">{{$job->status}}</span>
                                    @endif

                                </td>
                                <td>
                                    @if ($job->status == 'Active' || $job->status == 'Assigned')
                                    <a class="btn btn-sm btn-info disabled"><i class="fas fa-edit fa-fw"></i></a>
                                    @else
                                    <a class="btn btn-sm btn-success" data-mdb-toggle="modal"
                                        data-mdb-target="#actionModal"><i class="fas fa-edit fa-fw"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!--Section: Jobs-->

        <!--Section: Portfolios-->
        <section class="mb-4" id="portfolios-section">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="mb-0 text-center text-primary"><strong>Portfolios</strong></h5>
                </div>
                <div class="card-body">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Title</th>
                                <th>Experience</th>
                                <th>Skills</th>
                                <th>Rate</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($portfolios as $portfolio)
                            <tr>
                                <td>
                                    <p class="fw-bold mb-1">{{$portfolio->name}}</p>
                                </td>
                                <td>
                                    <p class="fw-bold mb-1">{{$portfolio->experience}} Years</p>
                                </td>
                                <td>
                                    <x-cards.skills :skills="$portfolio->skills" />
                                </td>
                                <td>
                                    <p class="fw-bold mb-1">Rs {{$portfolio->hourly_rate}} / hr</p>
                                </td>
                                <td>
                                    @if ($portfolio->status == 'Approved')
                                    <span class="badge badge-dark rounded-pill d-inline">{{$portfolio->status}}</span>
                                    @else
                                    <span
                                        class="badge badge-warning rounded-pill d-inline">{{$portfolio->status}}</span>
                                    @endif

                                </td>
                                <td>
                                    @if ($portfolio->status == 'Approved')
                                    <a class="btn btn-sm btn-info disabled"><i class="fas fa-edit fa-fw"></i></a>
                                    @else
                                    <a class="btn btn-sm btn-success"><i class="fas fa-edit fa-fw"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!--Section: Portfolios-->

        <x-modals.category />
        <x-modals.action />
    </div>
    </main>
    <!--Main layout-->
    @endsection

    <!-- Handling the Admin page -->
    <script type="text/javascript" src="{{ asset('/lib/js/jquery-3.4.1.min.js') }}"></script>
    <script>
    $(document).ready(function() {
        // Activating navigation buttons
        $('.ripple').click(function() {
            $('a').removeClass('active');
            $(this).addClass('active');
        });

        /**
         * 
         * Scrolling up and down
         */

        $("#dashboard").click(function() {
            $('html, body').animate({
                scrollTop: eval($("#dashboard-section").offset().top - 90)
            }, 100);
        });

        $("#category").click(function() {
            $('html, body').animate({
                scrollTop: eval($("#category-section").offset().top - 90)
            }, 100);
        });

        $("#employer").click(function() {
            $('html, body').animate({
                scrollTop: eval($("#employer-section").offset().top - 90)
            }, 100);
        });

        $("#labour").click(function() {
            $('html, body').animate({
                scrollTop: eval($("#labour-section").offset().top - 90)
            }, 100);
        });

        $("#jobs").click(function() {
            $('html, body').animate({
                scrollTop: eval($("#jobs-section").offset().top - 90)
            }, 100);
        });

        $("#portfolios").click(function() {
            $('html, body').animate({
                scrollTop: eval($("#portfolios-section").offset().top - 90)
            }, 100);
        });


        // Filling the chart
        var ctx = $("#myChart");

        var myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: [
                    "Employers",
                    "Labours",
                    "Portfolios",
                    "Approved Portfolios",
                    "Jobs",
                    "Approved Jobs",
                    "Completed Jobs",
                    "Pending Jobs",
                ],
                datasets: [{
                    data: ['{{$employers->count()}}', '{{$labours->count()}}',
                        '{{$portfolios->count()}}',
                        '{{$app_portfolio->count()}}', '{{$jobs->count()}}',
                        '{{$app_job->count()}}',
                        '{{$complete_job->count()}}', '{{$pending_job->count()}}'
                    ],
                    backgroundColor: "#007bff",
                    borderColor: "#007bff",
                    borderWidth: 0,
                    pointBackgroundColor: "#000",
                }],
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                        },
                    }, ],
                },
                legend: {
                    display: false,
                },
            },
        });
    });
    </script>