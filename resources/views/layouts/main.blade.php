<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mazdoor Online</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.jpg') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@400;500;600;700&display=swap" rel="stylesheet" />


    <!-- Material Design Bootstrap -->
    <link href="{{ asset('/lib/css/mdb.min.css') }}" rel="stylesheet" />
    <!-- Toastr -->
    <link href="{{ asset('/lib/css/toastr.min.css') }}" rel="stylesheet" />
    <!-- cutome css -->
    <link type="text/css" href="{{ asset('/css/custom.css') }}" rel="stylesheet" />


</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top mb-5">
        <x-navbar />
    </nav>
    <x-flash-message />
    <!-- Content of Main Page -->
    <main>
        @yield('content')
    </main>
    <!-- /Content of Main Page -->


    <footer class="bg-light text-center text-lg-start">
        <x-footer />
    </footer>

    <script type="text/javascript" src="{{asset('/lib/js/mdb.min.js')}}"></script>


</body>

</html>