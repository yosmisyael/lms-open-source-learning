@extends('dashboard.admin.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Question</h1>
</div>
<div class="row">
    <div class="col-lg-8 mb-3">
        <form action="/admin/dashboard/tests/{{ $test_id }}/questions/{{ $data->id }}" method="post">
          @method('put')
            @csrf
              {{-- test_id --}}
              <input type="hidden" name="test_id" value="{{ $test_id }}">     

              {{-- questions --}}
              <div class="form-outline form-floating mb-4">
                <input type="text" id="content" name="content" class="form-control form-control-lg @error('name')
                  is-invalid
                @enderror"
                  placeholder="Enter your name" required required value="{{ old('name', $data->content) }}" />
                <label class="form-label" for="content">Question</label>
                @error('content')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>         

              {{-- options --}}
              <p class="fw-bolder px-4">Mark a correct answer</p>
              @foreach (range(1, 4) as $i)
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="answer_radio" value="{{ $i }}" id="radio_{{ $i }}"  @if ($data->answer === $data["option{$i}"])
                  checked
                  @endif required>
                  <input type="text" name="option{{ $i }}" value="{{ old("option{$i}", $data["option{$i}"]) }}" class="form-control mb-2 option-input" placeholder="option {{ $i }}" required/>
                </div>
              @endforeach

              <input type="hidden" name="answer" id="hidden_answer" value="">

            <button class="btn btn-primary" type="submit">Update Question</button>
        </form>
    </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
        function updateHiddenAnswer() {
            let radioValue = $("input[name='answer_radio']:checked").val();
            let optionValue = $("input[name='option" + radioValue + "']").val();
            $("#hidden_answer").val(optionValue);
        }

        $(".form-check-input").on("change", function () {
            if ($(this).is(":checked")) {
                updateHiddenAnswer();
            }
        });

        // Handle input events of the option inputs
        $(".option-input").on("input", function () {
            updateHiddenAnswer();
        });

        // Initialize the hidden answer input based on the selected radio button
        $("input[name='answer_radio']:checked").trigger("change");
    });
  </script>
</div>
@endsection