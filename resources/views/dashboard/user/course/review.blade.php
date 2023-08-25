@extends('dashboard.user.layouts.main')

@section('container')
    <div class="container">
        <a href="/users/{{ $username }}/dashboard/courses/{{ $course_id }}" class="text-decoration-none"><i class="bi bi-chevron-left"></i> Back</a>

        <h1 class="mt-5">Result for {{ $test_name }}</h1>
        
        <h4 class="mt-3 mb-2">{{ $result_status }}</h4>
        <p>Score: {{ $score }}</p>
        <table class="table mt-3">
            <thead>
              <tr>
                <th scope="col">Number</th>
                <th scope="col">Question Point</th>
                <th scope="col">Your Answer</th>
                <th scope="col">Correct Answer</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($submited_answers as $index => $submited_answer)
                @php
                    $move_index = array_search(reset($submited_answers), $submited_answers);
                @endphp
                    <tr class="@if ($submited_answer !== $correct_answers[$index - $move_index])
                        table-danger
                    @else
                        table-success
                    @endif">
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $point }}</td>
                        <td>{{ $submited_answer }}</td>
                        <td>{{ $correct_answers[$index - $move_index] }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection