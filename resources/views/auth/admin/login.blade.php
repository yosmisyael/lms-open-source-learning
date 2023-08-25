@extends('layouts.main')
@section('container')
<div class="container mt-5 d-flex justify-content-center align-items center" style="min-height: 100vh">
  <form method="POST" action="/admin" style="width: 300px" class="form-floating">
      @csrf
      <h1 class="my-3 text-center">LMS Administrator</h1>
      @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>{{ session('loginError') }}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

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
      <button type="submit" class="btn btn-primary btn-block my-4 w-100">Sign in</button>
  </form>
</div>
@endsection