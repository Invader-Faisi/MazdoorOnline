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
        <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@400;500;600;700&display=swap"
            rel="stylesheet" />


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
        <div class="container mt-5 py-5">
            <h2>About Us</h2>
            <p>Welcome to MazdoorOnline! We are a leading web application that connects skilled workers with potential
                employers,
                making the process of hiring and finding work efficient and hassle-free. Our platform is designed to bridge the
                gap
                between job seekers and employers, creating a seamless experience for both parties.</p>
        
            <h3>Our Mission</h3>
            <p>At MazdoorOnline, our mission is to empower skilled workers by providing them with a platform to showcase their
                talents and connect with employers who value their expertise. We aim to simplify the hiring process for
                employers,
                making it easier for them to find the right talent for their projects. We are committed to fostering a vibrant
                and
                inclusive community where job opportunities are accessible to everyone.</p>
        
            <h3>Why Choose MazdoorOnline?</h3>
            <ul>
                <li><strong>Wide Range of Skilled Workers:</strong> Our platform hosts a diverse pool of skilled workers from
                    various
                    industries, ensuring that you can find the perfect match for your project.</li>
                <li><strong>User-Friendly Interface:</strong> We prioritize creating an intuitive and user-friendly interface
                    that
                    enables both job seekers and employers to navigate the platform effortlessly.</li>
                <li><strong>Security and Reliability:</strong> Your data and transactions are safe with us. We implement robust
                    security
                    measures to protect your information and maintain the utmost reliability of our services.</li>
                <li><strong>Efficient Communication:</strong> We provide tools for seamless communication between job seekers
                    and
                    employers, allowing them to discuss project details and expectations easily.</li>
                <li><strong>Dedicated Support:</strong> Our customer support team is always ready to assist you with any
                    inquiries or
                    concerns you may have.</li>
            </ul>
        
            <p>Join MazdoorOnline today and experience a modern and effective way of connecting talent with opportunities!</p>
        </div>


        <footer class="text-center" style="background-color: #45637d;">
            <x-footer />
        </footer>


        <script type="text/javascript" src="{{asset('/lib/js/mdb.min.js')}}"></script>

    </body>

</html>