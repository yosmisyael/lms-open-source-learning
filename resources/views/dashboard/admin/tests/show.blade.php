@extends('dashboard.admin.layouts.main')

@section('container')
    <h1>Question List of {{ $data->name }}</h1>
    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <a href="/admin/dashboard/tests" class="btn btn-dark mb-3 fw-bolder"><i class="bi bi-arrow-left-square"></i> Back to Test List</a>
    <a href="/admin/dashboard/tests/{{ $data->id }}/questions/create" class="btn btn-primary mb-3 fw-bolder"><i class="bi bi-plus"></i> Add Question</a>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">No.</th>
            <th scope="col">Question</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($questions as $q)
            <tr>
              <td>{{ $q->id }}</td>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $q->content }}</td>
              <td>
                  <a href="/admin/dashboard/tests/{{ $data->id }}/questions/{{ $q->id }}" class="btn btn-primary"><i class="bi bi-eye-fill"></i> Show</a>
                  <a href="/admin/dashboard/tests/{{ $data->id }}/questions/{{ $q->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                  <form action="/admin/dashboard/tests/{{ $data->id }}/questions/{{ $q->id }}" class="d-inline" method="POST">
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