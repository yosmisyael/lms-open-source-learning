@extends('layouts.main')
@section('container')
<div class="container mt-5 d-flex justify-content-center align-items center" style="min-height: 100vh">
    <form method="POST" action="/login" style="width: 300px" class="form-floating">
        @csrf
        <h1 class="my-3 text-center">Login</h1>
        @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if (session()->has('warning'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('warning') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if (session()->has('loginError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('loginError') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <!-- Email input -->
        <div class="form-outline form-floating mb-4">
            <input type="email" id="email" name="email" class="form-control form-control-lg @error('email')
              is-invalid
            @enderror"
              placeholder="Enter a valid email address" required autofocus value="{{ old('email') }}" />
            <label class="form-label" for="email">Email address</label>
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>
          
        <!-- Password input -->
        <div class="form-outline form-floating mb-3">
            <input type="password" id="password" name="password" class="form-control form-control-lg @error('password')
              is-invalid
            @enderror"
              placeholder="Enter password" required />
            <label class="form-label" for="password">Password</label>
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>
        
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block my-4 w-100">Sign in</button>
        
        <!-- Register buttons -->
        <div class="text-center">
            <p>Not a member? <a href="/register">Register</a></p>
        </div>

</div>
</form>
@endsection