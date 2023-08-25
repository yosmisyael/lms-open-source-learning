@extends('dashboard.admin.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Update Lesson</h1>
</div>
<div class="row">
    <div class="col-lg-8 mb-3">
        <form action="/admin/dashboard/courses/{{ $course_id }}/lesson/{{ $data->id }}" method="post">
          @method('put')
          @csrf
            {{-- course_id --}}
            <input type="hidden" name="course_id" value="{{ $course_id }}">

            {{-- title --}}
            <div class="form-outline form-floating mb-4">
              <input type="text" id="title" name="title" class="form-control form-control-lg @error('title')
                is-invalid
              @enderror"
                placeholder="Enter your name" required required value="{{ old('title', $data->title) }}" />
              <label class="form-label" for="title">Lesson Title</label>
              @error('title')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            {{-- order options --}}
            <div class="form-outline mb-4">
              <label for="order" class="form-label fw-bolder">Order</label>
              <select id="order" class="form-select" aria-label="Default select example" name="order" @error('order')
                {{ $message }}
              @enderror>     
                @foreach(range(1, $total_lessons) as $i)
                  <option value="{{ $i }}" 
                  @if ($i !== $data->order && !in_array($i, $available_order))
                    disabled
                  @elseif ($i === $data->order)
                    selected
                  @endif>{{ $i }}</option>                
                  @endforeach                  
                  <option value="">not assigned</option>                
              </select>
              @error('order')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            {{-- lesson --}}
            <div class="my-3">
              <label for="body" class="form-label fw-bolder">Body</label>
              @error('body')
                <p class="text-danger">
                    {{ $message }}
                </p>
              @enderror
              <input id="body" type="hidden" name="body" value="{{ $data->body }}">
              <trix-editor input="body"></trix-editor>
            </div>

            <button class="btn btn-primary" type="submit">Update Course</button>
        </form>
    </div>
</div>
@endsection