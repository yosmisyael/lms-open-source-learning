@extends('dashboard.user.layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <h1>Courses List</h1>
        </div>
        <h4 class="mt-5">Currently Learning</h4>
        <hr class="border border-dark border-3 opacity-75">
        <div class="d-flex gap-2">
          @if (!empty($uncompleted_courses))
            @foreach ($uncompleted_courses as $course)
              <div class="card text-decoration-none" style="width: 18rem;">
                  <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top img-fluid" alt="cover picture">
                  <div class="card-body">
                    <h2 class="card-title fw-bold">{{ $course->title }}</h2>
                    <p class="card-text">
                      {{ Illuminate\Support\Str::limit(strip_tags(html_entity_decode($course->description)), 50, '...') }}
                    </p>
                    <a href="/users/{{ auth()->user()->username }}/dashboard/courses/{{ $course->id }}" style=" cursor: pointer" class="btn btn-primary">Learn</a>
                  </div>
                </div>
            @endforeach
          @else
            <p class="text-center">Nothing left to completed</p>
          @endif
        </div>
        <h4 class="mt-5">Completed</h4>
        <hr class="border border-dark border-3 opacity-75">
        <div class="d-flex gap-2">
        @if (!empty($completed_courses))
          @foreach ($completed_courses as $course)
          <div class="card text-decoration-none" style="width: 18rem;">
              <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top img-fluid" alt="cover picture">
              <div class="card-body">
                <h2 class="card-title fw-bold">{{ $course->title }}</h2>
                <p class="card-text">
                  {{ Illuminate\Support\Str::limit(strip_tags(html_entity_decode($course->description)), 50, '...') }}
                </p>
                <a href="/users/{{ auth()->user()->username }}/dashboard/courses/{{ $course->id }}" style=" cursor: pointer" class="btn btn-primary">Learn</a>
              </div>
            </div>
          @endforeach
        @else
          <p class="text-center">You did not have any completed courses.</p>
        @endif
        </div>
    </div>
@endsection