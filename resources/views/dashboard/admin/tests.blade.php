@extends('dashboard.admin.layouts.main')

@section('container')
    <h1>Test List</h1>
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
    <a href="/admin/dashboard/tests/create" class="btn btn-primary mb-3 fw-bolder"><i class="bi bi-plus"></i> Create New Test</a>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Minimum Score</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $test)
            <tr>
              <td>{{ $test->id }}</td>
              <td>{{ $test->name }}</td>
              <td>{{ $test->min_score }}</td>
              <td>
                  <a href="/admin/dashboard/tests/{{ $test->id }}" class="btn btn-primary"><i class="bi bi-eye-fill"></i> Manage Questions</a>
                  <a href="/admin/dashboard/tests/{{ $test->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                  <form action="/admin/dashboard/tests/{{ $test->id }}" class="d-inline" method="POST">
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