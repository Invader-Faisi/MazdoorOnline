@extends('layouts.main')

@section('content')
    <div class="container pt-5 my-5">
        <h1 class="text-center text-bold text-primary">Login Form</h1>
        <section class="mx-auto my-5" style="max-width: 35rem;">
            <form method="POST" method="{{ url('/login') }}">
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control" />
                    <label class="form-label" for="email">Email address</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-5">
                    <input type="password" id="password" name="password" class="form-control" />
                    <label class="form-label" for="password">Password</label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block">Login In</button>
            </form>
        </section>
    </div>
@endsection
