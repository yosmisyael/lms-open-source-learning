@extends('dashboard.admin.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Question</h1>
</div>
<div class="row">
    <div class="col-lg-8 mb-3">
        <form action="/admin/dashboard/tests/{{ $test_id }}/questions" method="post">
            @csrf

              {{-- test_id --}}
              <input type="hidden" name="test_id" value="{{ $test_id }}">     

              {{-- questions --}}
              <div class="form-outline form-floating mb-4">
                <input type="text" id="content" name="content" class="form-control form-control-lg @error('name')
                  is-invalid
                @enderror"
                  placeholder="Enter your name" required required value="{{ old('name') }}" />
                <label class="form-label" for="content">Question</label>
                @error('content')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>         

              {{-- options --}}
              <p class="fw-bolder px-4">Mark a correct answer</p>
              @for ($i = 0; $i < 4; $i++)
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="answer_radio" value="{{ $i }}" id="radio_{{ $i }}" required>
                  <input type="text" name="option{{ $i + 1 }}" class="form-control mb-2 option-input" placeholder="option {{ $i + 1 }}" required/>
                </div>
              @endfor

              <input type="hidden" name="answer" id="hidden_answer" value="">

            <button class="btn btn-primary" type="submit">Add Question</button>
        </form>
    </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    // $(document).ready(function () {
    //     $(".form-check-input").on("change", function () {
    //         if ($(this).is(":checked")) {
    //           var radioValue = $(this).val();
    //           $("#hidden_answer").val($("input[name='option" + (parseInt(radioValue) + 1) + "']").val());
    //         }
    //     });
    // });
    $(document).ready(function () {
        $(".form-check-input").on("change", function () {
            if ($(this).is(":checked")) {
                let radioValue = $(this).val();
                $("#hidden_answer").val($("input[name='option" + (parseInt(radioValue) + 1) + "']").val());
            }
        });

        $(".option-input").on("input", function () {
            let radioValue = $("input[name='answer_radio']:checked").val();
            if (radioValue !== undefined) {
                $("#hidden_answer").val($("input[name='option" + (parseInt(radioValue) + 1) + "']").val());
            }
        });
    });
  </script>
</div>
@endsection