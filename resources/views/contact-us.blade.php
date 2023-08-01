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
            <h2>Contact Us</h2>
            <p>Have any questions or need assistance? We're here to help. Feel free to get in touch with us through the
                following
                channels:</p>
        
            <p><strong>Email:</strong> support@mazdooronline.com</p>
        
            <p><strong>Phone:</strong> +92 03001234567</p>
        
            <p><strong>Address:</strong> 123 Main Street, City ABC, Pakistan, Zip Code (0000)</p>
        
            <p><strong>Operating Hours:</strong><br>
                Monday to Friday: 9:00 AM to 6:00 PM</p>
        
            <p>Alternatively, you can use the contact form below to send us a message directly:</p>
        
            <form>
                <!-- Name input -->
                <div class="form-outline mb-4">
                    <input type="text" id="form4Example1" class="form-control" />
                    <label class="form-label" for="form4Example1">Name</label>
                </div>
            
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="form4Example2" class="form-control" />
                    <label class="form-label" for="form4Example2">Email address</label>
                </div>
            
                <!-- Message input -->
                <div class="form-outline mb-4">
                    <textarea class="form-control" id="form4Example3" rows="4"></textarea>
                    <label class="form-label" for="form4Example3">Message</label>
                </div>
            
                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-center mb-4">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form4Example4" checked />
                    <label class="form-check-label" for="form4Example4">
                        Send me a copy of this message
                    </label>
                </div>
            
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>
            </form>
        
            <p>We value your feedback and are constantly looking for ways to improve our platform. If you have any suggestions
                or
                ideas, please don't hesitate to reach out to us. Our team will get back to you as soon as possible.</p>
        
            <p>Stay connected with MazdoorOnline on our social media channels:</p>
        
        </div>

        <footer class="text-center" style="background-color: #45637d;">
            <x-footer />
        </footer>


        <script type="text/javascript" src="{{asset('/lib/js/mdb.min.js')}}"></script>

    </body>

</html>