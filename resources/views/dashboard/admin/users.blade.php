@extends('dashboard.admin.layouts.main')

@section('container')
    <h1>User List</h1>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Email</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col">Course List</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $user)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->username }}</td>
              <td>
                @foreach ($user->courses as $course)
                  <p>{{ $course->title }}</p>
                @endforeach
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
@endsection