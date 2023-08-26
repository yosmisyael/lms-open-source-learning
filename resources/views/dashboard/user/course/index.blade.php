@extends('dashboard.user.layouts.main')
{{-- @dd($lessons) --}}
@section('container')
    <div class="container">
        <div class="row pb-5">
            <a href="/users/{{ auth()->user()->username }}/dashboard/courses" class="text-decoration-none"><i class="bi bi-chevron-left"></i> Back to Course List</a>
            <img src="{{ asset('storage/'.$data->image) }}" class="mt-3 rounded" style="border-radius: 8px" alt="course cover image">
            <h1 class="mt-5 fw-bolder text-capitalize">{{ $data->title }}</h1>
            <div class="row">
                <div class="col-md-10 col-12 pr-3">
                    <p>{!! $data->description !!}</p>
                </div>
                <div class="col-md-2 col-12 rounded p-3" style="background-color: #CED4DA;">
                    <a href="#lessons-list" class="text-decoration-none d-block mb-1">Lessons List</a>
                    <a href="#test" class="text-decoration-none d-block mb-1">Unit Test</a>
                    @if ($user_course->score)
                        @if ($is_rated)
                            <a href="/users/{{ auth()->user()->username }}/dashboard/courses/{{ $data->id }}/review/edit" class="text-decoration-none d-block mb-1">Update Your Review</a>
                        @else
                            <a href="/users/{{ auth()->user()->username }}/dashboard/courses/{{ $data->id }}/review" class="text-decoration-none d-block mb-1">Give Review</a>
                        @endif
                        <form action="/users/{{ auth()->user()->username }}/dashboard/courses/{{ $data->id }}/certificate" method="post" class="mb-1">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="course_id" value="{{ $data->id }}">
                            <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                            <input type="hidden" name="course" value="{{ $data->title }}">
                            <input type="hidden" name="score" value="{{ $user_course->score }}">
                            <button class="btn btn-primary w-100" type="submit">View Certificate</button>
                        </form>
                    @endif
                </div>
            </div>
            
            {{-- lessons list --}}
            <h5 class="mt-3 mb-3 fw-bold" id="lessons-list">Lessons</h5>
            <div class="list-group">
                @foreach ($lessons->sortBy('order') as $lesson)
                    <a href="/users/{{ auth()->user()->username }}/dashboard/courses/{{ $data->id }}/lesson/{{ $lesson->id }}" class="border border-primary justify-content-between d-flex list-group-item list-group-item-action list-group-item-secondary px-5 fw-bolder">{{ $lesson->title }} 
                    </a>
                @endforeach
            </div>

            {{-- test --}}
            <h5 class="mt-5 mb-3 fw-bold" id="test">Course Test</h5>
            <p >Score a minimum grade of {{ $test->min_score }} to pass this course.</p>
            <div class="list-group">
                <a href="/users/{{ auth()->user()->username }}/dashboard/courses/{{ $data->id }}/test/{{ $test->id }}" class="border border-dark list-group-item list-group-item-action px-5 fw-bolder d-flex justify-content-between  
                    @if ($user_course->is_completed == 1)
                    list-group-item-success
                    @else
                    list-group-item-dark
                    @endif">
                    {{ $test->name }}
                    @if ($user_course->is_completed == 1)
                        <i class="text-success fw-bolder bi bi-check2-circle"></i>
                    @endif
                </a>
            </div>
            @if ($user_course->is_completed == 1)
                <p class="lh-1 mt-3">Passed Test Score: {{ $user_course->score }}</p>
                <p class="text-muted lh-1">Note: You can now retake the test to further solidify your knowledge and challenge yourself.</p>
            @endif
        </div>
    </div>
@endsection