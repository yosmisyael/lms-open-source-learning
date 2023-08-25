@extends('dashboard.user.layouts.main')
{{-- @dd($data->courses[0]->pivot) --}}
@section('container')
<div class="container rounded bg-white mt-5 mb-5 user-select-none">
    <div class="row">
        <div class="col-md-5 border-right mx-auto">
            <div class="d-flex flex-column align-items-center text-center p-3">
                <img class="rounded-circle mt-5" width="150px" height="150px" src="@if ($data->image === null)
                    {{ asset('storage/user-pictures/default.svg') }}
                @else   
                    {{ asset('storage/'.auth()->user()->image) }}
                @endif">
                <span class="font-weight-bold">{{ $data->username }}</span>
                <span class="text-black-50">{{ $data->email }}</span>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center">{{ $data->name }}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row py-5">
        <div class="col-md-8 mx-auto list-styled-none">
            <h3>Certificates Achieved</h3>
            @if ($data->courses->where('pivot.is_completed', 1)->count() > 0)
            @foreach ($data->courses as $course)
                @if ($course->pivot->is_completed === 1)
                    <div class="list-group">
                        <form method="POST" action="/users/{{ $data->username }}/dashboard/courses/{{ $course->pivot->course_id }}/certificate" class="list-group-item list-group-item-action flex-column align-items-start certificate-form-container">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $course->pivot->user_id }}">
                            <input type="hidden" name="course_id" value="{{ $course->pivot->course_id }}">
                            <input type="hidden" name="name" value="{{ $data->name }}">
                            <input type="hidden" name="course" value="{{ $course->title }}">
                            <input type="hidden" name="score" value="{{ $course->pivot->score }}">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $course->title }}</h5>
                            </div>
                            <button type="submit" class="hidden-submit" style="display: none;"></button>
                        </form>
                    </div>
                @endif
            @endforeach
            @else
                <p>You have not yet finished any courses. To receive a certificate, complete the courses.</p>
            @endif
        </div>
    <div class="row py-4">
        <div class="col-md-12 d-flex justify-content-end border-right mx-auto">
            <a href="/users/{{ auth()->user()->username }}/dashboard/profile/edit" class="btn btn-primary">Edit Profile</a>
        </div>    
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const certificateForms = document.querySelectorAll('.certificate-form-container');
            
            certificateForms.forEach(form => {
                form.addEventListener('click', function() {
                    const hiddenSubmit = form.querySelector('.hidden-submit');
                    hiddenSubmit.click();
                });
            });
        });
        </script>
</div>
@endsection