@extends('layouts.main')

@section('content')
    <div class="container pt-5 my-5">
        <h1 class="text-center text-bold text-primary">Registration Form</h1>
        <section class="mx-auto pt-5" style="max-width: 35rem;">
            <form>
                <!-- Name -->
                <div class="form-outline mb-4">
                    <input type="text" id="name" name="name" class="form-control" />
                    <label class="form-label" for="name">Full Name</label>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control" />
                    <label class="form-label" for="email">Email address</label>
                </div>

                <!-- Address input -->
                <div class="form-outline mb-4">
                    <input type="text" id="address" name="address" class="form-control" />
                    <label class="form-label" for="address">Address</label>
                </div>

                <!-- Contact input -->
                <div class="form-outline mb-4">
                    <input type="text" id="contact" name="contact" class="form-control" />
                    <label class="form-label" for="contact">Contact No</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="password" name="password" class="form-control" />
                    <label class="form-label" for="password">Password</label>
                </div>

                <!-- Repeat Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="r_password" name="r_password" class="form-control" />
                    <label class="form-label" for="r_password">Repeat Password</label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

            </form>
        </section>
    </div>
@endsection
