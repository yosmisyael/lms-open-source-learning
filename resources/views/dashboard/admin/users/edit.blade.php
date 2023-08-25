@extends('dashboard.admin.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Test</h1>
</div>
<div class="row">
    <div class="col-lg-8 mb-3">
        <form action="/admin/dashboard/tests/{{ $data->id }}" method="post">
            @method('put')
            @csrf

            <div class="form-outline form-floating mb-4">
                <input type="text" id="name" name="name" class="form-control form-control-lg @error('name')
                  is-invalid
                @enderror"
                  placeholder="Enter your name" required required value="{{ old('name', $data->name) }}" />
                <label class="form-label" for="name">Name</label>
                @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>

            <button class="btn btn-primary">Update Test</button>
        </form>
    </div>
</div>
@endsection