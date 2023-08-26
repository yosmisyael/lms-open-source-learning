@extends('dashboard.admin.layouts.main')

@section('container')
  <div class="container">
    <a href="/admin/dashboard/tests/{{ $data->test_id }}" class="text-decoration-none"><i class="bi bi-arrow-left-square"></i> Back</a>
    <form action="">
      <h3 class="my-3">{{ $data->content }}</h3>
      @foreach (range(1, 4) as $i)
        <div class="form-check">
          <input class="form-check-input" type="radio" name="option" id="flexRadioDefault{{ $i }}">
          <label class="form-check-label" for="flexRadioDefault{{ $i }}">{{ $data["option{$i}"] }}</label>
        </div>
      @endforeach
    </div>
  </form>
@endsection