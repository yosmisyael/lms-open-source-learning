@extends('layouts.main')

@section('custom_css')
<style>
  .card-image {
    height: 210px;
    width: 100%;
  } 
</style>
@endsection

@section('container')
<div class="container mt-3">
  <div class="row mb-2">
    
    {{-- search bar --}}
    <h2 class="text-center">Courses List</h2>
    <div class="row justify-content-center mb-3 mt-3">
      <div class="col-md-6">
        <form action="/courses">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search keyword..." aria-label="Search keyword..." aria-describedby="button-addon2" name="search" value="{{ request('search') }}" autofocus>
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
          </div>
        </form>
      </div>
    </div>
    
    {{-- card list --}}
    <div class="container d-flex justify-content-center">
      <div class="row row-cols-1 g-1">
        @if ($data->count())
          @foreach ($data as $course)
            <a href="/courses/{{ $course->id }}" class="col user-select-none text-decoration-none">
              <div class="card mb-3 bg-body-tertiary shadow" style="width: 100%;">
                <div class="row g-0">
                  <div class="col-md-4" >
                    <img
                      src="{{ asset('storage/'.$course->image) }}"
                      alt="course cover image"
                      class="img-fluid rounded card-image"
                    />
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{ $course->title }}</h5>
                      <p class="card-text lh-1">
                        {{ Illuminate\Support\Str::limit(strip_tags(html_entity_decode($course->description)), 200, '...') }}
                      </p>
                      <p class="text-muted lh-1"><i class="bi bi-person-fill text-primary"></i> {{ $course->users_count }} students enrolled</p>
                      <p class="text-muted lh-1"><i class="bi bi-star-fill text-warning"></i> {{ $course->rating }} ({{ $course->rating_users_count }})</p>
                      <p class="text-muted lh-1 text-capitalize"><i class="bi bi-reception-2 text-danger"></i> {{ $course->level }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          @endforeach
        @else
          <p class="text-center fs-4 mx-auto">No course found</p>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection