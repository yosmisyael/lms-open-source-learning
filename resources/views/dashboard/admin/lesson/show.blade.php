@extends('dashboard.admin.layouts.main')

@section('container')
<main>
  <section class="pt-0">
    <div class="container position-relative" data-sticky-container="">
      <div class="row">
        <a href="/admin/dashboard/courses/{{ $course_id }}" class="text-decoration-none"><i class="bi bi-arrow-left-square"></i> Back</a>
        <h1>{{ $data->title }}</h1>
        
        <!-- Main Content -->
        <div class="col-lg-9 mb-5">
          <p>{!! $data->body !!}</p>
      </div>
    </div>
  </section>
</main>
@endsection