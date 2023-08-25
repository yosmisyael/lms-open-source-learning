@extends('dashboard.user.layouts.main')

@section('container')
<main>
    <section class="pt-3">
        <div class="container position-relative" data-sticky-container="">
            <a href="/users/{{ auth()->user()->username }}/dashboard/courses/{{ $course_id }}" class="text-decoration-none mb-3"><i class="bi bi-chevron-left"></i> Back</a>
            <div class="row">
                {{-- <!-- Images -->
                <div class="row g-2 my-5">
                    <div class="col-md-4">
                        <a href="{{ asset('storage/'.$data->image) }}" data-glightbox="" data-gallery="image-popup">
                            <img class="rounded" src="{{ asset('storage/'.$data->image) }}" alt="Image">
                        </a>
                    </div>
                </div> --}}

                <h1 class="mt-3">{{ $data->title }}</h1>
            
                <!-- Main Content -->
                <div class="col-lg-9 mb-5">
                    <p>{!! $data->body !!}</p>
                </div>
            </div>
        </div>
    </section>
</main>
{{-- <div class="container fixed  d-flex justify-content-between">
    <a href="" class="text-decoration-none text-left">Previous lesson</a>
    <a href="" class="text-decoration-none text-right">Next lesson</a>
</div> --}}
@endsection