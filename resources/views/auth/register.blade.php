@extends('layouts.main')
@section('container')
<div class="container mt-5 d-flex justify-content-center align-items center" style="min-height: 100vh">
    <form action="/register" method="POST" style="width: 300px" class="form-floating">
        @csrf
        <h1 class="my-3 text-center">Register</h1>
        
        <!-- Email input -->
        <div class="form-outline form-floating mb-4">
            <input type="email" id="email" name="email" class="form-control form-control-lg @error('email')
              is-invalid
            @enderror"
              placeholder="Enter a valid email address" required value="{{ old('email') }}" />
            <label class="form-label" for="email">Email address</label>
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <!-- Name input -->
          <div class="form-outline form-floating mb-4">
            <input type="text" id="name" name="name" class="form-control form-control-lg @error('name')
              is-invalid
            @enderror"
              placeholder="Enter your name" required required value="{{ old('name') }}" />
            <label class="form-label" for="name">Name</label>
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <!-- Username input -->
          <div class="form-outline form-floating mb-4">
            <input type="text" id="username" name="username" class="form-control form-control-lg @error('username')
              is-invalid
            @enderror"
              placeholder="Create your username" required value="{{ old('username') }}" />
            <label class="form-label" for="username">Username</label>
            @error('username')
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
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block my-4 w-100">Sign Up</button>
        
        <!-- Register buttons -->
        <div class="text-center">
            <p>Already have an accound? <a href="/login">Login</a></p>
        </div>

</div>
</form>
@endsection