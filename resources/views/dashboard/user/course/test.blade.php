@extends('dashboard.user.layouts.main')

@section('container')
    <div class="container">
        <form action="/users/{{ auth()->user()->username }}/dashboard/courses/{{ $course_id }}/test/{{ $test->id }}" method="post" id="questions-form">
            @csrf

            <h1>{{ $test->name }}</h1>
            
            @foreach ($data as $question)
            <div class="card my-3" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title">{{ $question->content }}</h5>
                    @foreach (range(1, 4) as $option)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="question{{ $question->id }}option{{ $option }}" value="{{ $question["option{$option}"] }}" required>
                            <label class="form-check-label" for="question{{ $question->id }}option{{ $option }}">{{ $question["option{$option}"] }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            @endforeach
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#questions-form').on('submit', function (event) {
                    event.preventDefault();

                    var formData = $(this).serializeArray();

                    $(this).unbind('submit').submit();
                });
            });
        </script>
    </div>
@endsection