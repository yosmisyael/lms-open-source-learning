@extends('dashboard.admin.layouts.main')

@section('container')
    <h1>Course List</h1>
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
    @if (session()->has('danger'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session('danger') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>  
    @endif
    <a href="/admin/dashboard/courses/create" class="btn btn-primary mb-3 fw-bolder"><i class="bi bi-plus"></i> Add New Course</a>
    @if ($data->count())
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Course Name</th>
            <th scope="col">Description</th>
            <th scope="col">Total Lessons</th>
            <th scope="col">Level</th>
            <th scope="col">Test ID</th>
            <th scope="col">Published</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $course)
            <tr>
              <td>{{ $course->id }}</td>
              <td>{{ $course->title }}</td>
              <td>{{ Illuminate\Support\Str::limit(strip_tags(html_entity_decode($course->description)), 30, '...') }}</td>
              <td>{{ $course->total_lessons }}</td>
              <td>{{ $course->level }}</td>
              <td>
                @if ($course->test_id !== null)
                  {{ $course->test_id }}                
                @else
                  <p>No test has been assigned</p>
                @endif
              </td>
              <td>
                @if ($course->is_published == 0)
                  <p>No</p>
                @else
                  <p>Yes</p>
                @endif
              </td>
              <td>
                  <a href="/admin/dashboard/courses/{{ $course->id }}" class="btn btn-primary"><i class="bi bi-eye-fill"></i> Show</a>
                  <a href="/admin/dashboard/courses/{{ $course->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                  <form action="/courses/{{ $course->id }}/publish" class="d-inline" method="POST">
                    @method('put')
                    @csrf
                    <input type="hidden" name="is_published" value="1">
                    <button class="btn btn-success" onclick="return confirm('are you sure?')"><i class="bi bi-file-arrow-up-fill"></i> Publish</button>
                  </form>
                  <form action="/admin/dashboard/courses/{{ $course->id }}" class="d-inline" method="POST">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('are you sure?')"><i class="bi bi-trash-fill"></i> Delete</button>
                  </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
          @else
            <p class="text-cent fs-4">No course has been created yet</p>
          @endif

@endsection