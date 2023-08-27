@extends('dashboard.admin.layouts.main')

@section('style')
  <style>
    trix-toolbar [data-trix-button-group='file-tools'] {
      display: none;
    }
  </style>
@endsection

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create Course</h1>
</div>
<div class="row">
    <div class="col-lg-8 mb-3">
        <form action="/admin/dashboard/courses" method="post" enctype="multipart/form-data">
            @csrf

            {{-- title --}}
            <div class="form-outline form-floating mb-4">
                <input type="text" id="total_lessons" name="title" class="form-control form-control-lg @error('title')
                  is-invalid
                @enderror"
                  placeholder="Enter your name" required required value="{{ old('title') }}" />
                <label class="form-label" for="title">Name</label>
                @error('title')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>

            {{-- description --}}
            <div class="mb-3">
              <label for="description" class="form-label fw-bolder">Description</label>
              @error('description')
                  <p class="text-danger">
                      {{ $message }}
                  </p>
              @enderror
              <input id="description" type="hidden" name="description" value="{{ old('description') }}">
              <trix-editor input="description"></trix-editor>
            </div>

            {{-- total lessons --}}
            <div class="form-outline form-floating mb-4">
              <input type="text" id="total_lessons" name="total_lessons" class="form-control form-control-lg @error('total_lessons')
                is-invalid
              @enderror"
                placeholder="Enter lessons total for this course" required required value="{{ old('total_lessons') }}" />
              <label class="form-label" for="total_lessons">Total Lessons</label>
              @error('total_lessons')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            {{-- test options --}}
            <div class="mb-3">
              <label for="test" class="form-label fw-bolder">Test</label>
              <select id="test" class="form-select" aria-label="Default select example" name="test_id">     
                @if ($tests->count())
                  @foreach ($tests as $test)
                    <option value="{{ $test->id }}">{{ $test->name }}</option>                        
                  @endforeach
                  <option selected value=""></option>                  
                @else
                  <option selected value="">No test has been created yet</option>                  
                @endif   
              </select>
            </div>

            {{-- level options --}}
            <div class="mb-3">
              <label for="level" class="form-label fw-bolder">Level</label>
              <select id="level" class="form-select" aria-label="Default select example" name="level">     
                <option value="beginner">Beginner</option>                        
                <option value="advanced">Advanced</option>                        
              </select>
            </div>

            {{-- course picture --}}
            <div class="mb-3">
              <label for="image" class="form-label fw-bolder">Choose course picture</label>
              <img class="img-fluid img-preview mb-3 col-sm-5">
              <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
              @error('image')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <a href="/admin/dashboard/courses" class="btn btn-danger">Cancel</a>
            <button class="btn btn-primary" type="submit">Create Course</button>
        </form>
    </div>
    <script>
      document.addEventListener('trix-file-accept', function (e) {
        e.preventDefault();
      })

      function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');
        
        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
          imgPreview.src = oFREvent.target.result;
        }
      }
    </script>
</div>
@endsection