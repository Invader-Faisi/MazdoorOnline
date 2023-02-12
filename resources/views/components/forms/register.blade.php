@extends('layouts.main')

@section('content')
    <div class="container pt-5 my-5">
        <h1 class="text-center text-bold text-primary">Registration Form</h1>
        <section class="mx-auto pt-5" style="max-width: 35rem;">
            <form method="POST" action="{{ url('/register') }}">
                @csrf
                <!-- Name -->
                <div class="form-outline mb-1">
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" />
                    <label class="form-label" for="name">Full Name</label>
                </div>
                <p class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </p class="text-danger">
                <!-- Email input -->
                <div class="form-outline mb-1">
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" />
                    <label class="form-label" for="email">Email address</label>
                </div>
                <p class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </p class="text-danger">
                <!-- Address input -->
                <div class="form-outline mb-1">
                    <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}" />
                    <label class="form-label" for="address">Address</label>
                </div>
                <p class="text-danger">
                    @error('address')
                        {{ $message }}
                    @enderror
                </p class="text-danger">
                <!-- Contact input -->
                <div class="form-outline mb-1">
                    <input type="text" id="contact" name="contact" class="form-control" value="{{ old('contact') }}" />
                    <label class="form-label" for="contact">Contact No</label>
                </div>
                <p class="text-danger">
                    @error('contact')
                        {{ $message }}
                    @enderror
                </p class="text-danger">
                <!-- Password input -->
                <div class="form-outline mb-1">
                    <input type="password" id="password" name="password" class="form-control" />
                    <label class="form-label" for="password">Password</label>
                </div>
                <p class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </p class="text-danger">
                <!-- Repeat Password input -->
                <div class="form-outline mb-1">
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" />
                    <label class="form-label" for="password_confirmation">Repeat Password</label>
                </div>
                <p class="text-danger">
                    @error('password_confirmation')
                        {{ $message }}
                    @enderror
                </p class="text-danger">
                <input type="hidden" name="type" value="{{ $user }}">
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

            </form>
        </section>
    </div>
@endsection
