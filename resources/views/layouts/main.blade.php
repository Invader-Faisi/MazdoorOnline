<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mazdoor Online</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo1.png') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@400;500;600;700&display=swap" rel="stylesheet" />


    <!-- Material Design Bootstrap -->
    <link href="{{ asset('/lib/css/mdb.min.css') }}" rel="stylesheet" />
    <!-- Toastr -->
    <link href="{{ asset('/lib/css/toastr.min.css') }}" rel="stylesheet" />
    <!-- cutome css -->
    <link type="text/css" href="{{ asset('/css/custom.css') }}" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
        integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw=="
        crossorigin="anonymous"></script>


</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top mb-5">
        <x-navbar />
    </nav>
    <x-flash-message />
    <!-- Content of Main Page -->
    <main class="mb-10">
        @yield('content')
    </main>
    <!-- /Content of Main Page -->


    <footer class="text-center mt-5 fixed-bottom" style="background-color: #45637d;">
        <x-footer />
    </footer>


    <script type="text/javascript" src="{{asset('/lib/js/mdb.min.js')}}"></script>

</body>

</html>