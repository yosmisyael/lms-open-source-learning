@extends('dashboard.admin.layouts.main')

@section('container')
  <h1>Lesson List of {{ $data->title }}</h1>
  @if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  @if (session()->has('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session('error') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <a href="/admin/dashboard/courses" class="btn btn-dark mb-3 fw-bolder"><i class="bi bi-arrow-left-square"></i> Back to Course List</a>
  <a href="/admin/dashboard/courses/{{ $data->id }}/lesson/create" class="btn btn-primary mb-3 fw-bolder"><i class="bi bi-plus"></i> Add Lesson</a>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Order</th>
        <th scope="col">Title</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($lessons as $lesson)
        <tr>
          <td>{{ $lesson->id }}</td>
          <td>
            @if ($lesson->order !== null)
              {{ $lesson->order }}            
            @else
              Not assigned yet
            @endif
          </td>
          <td>{{ $lesson->title }}</td>
          <td>
              <a href="/admin/dashboard/courses/{{ $data->id }}/lesson/{{ $lesson->id }}" class="btn btn-primary"><i class="bi bi-eye-fill"></i> Show</a>
              <a href="/admin/dashboard/courses/{{ $data->id }}/lesson/{{ $lesson->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
              <form action="/admin/dashboard/courses/{{ $data->id }}/lesson/{{ $lesson->id }}" class="d-inline" method="POST">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('are you sure?')"><i class="bi bi-trash-fill"></i> Delete</button>
              </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection