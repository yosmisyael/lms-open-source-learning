@extends('dashboard.user.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Profile</h1>
</div>
<div class="row">
    <div class="col-lg-8 mb-3">
        <form action="/users/{{ $data->username }}/dashboard/profile" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            {{-- old image --}}
            @if ($data->image !== null)
              <input type="hidden" name="old_image" value="{{ $data->image }}">              
            @endif

            {{-- name --}}
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
            
            {{-- username --}}
            {{-- <div class="form-outline form-floating mb-4">
                <input type="text" id="name" name="username" class="form-control form-control-lg @error('username')
                  is-invalid
                @enderror"
                  placeholder="Enter your name" required required value="{{ old('username', $data->username) }}" />
                <label class="form-label" for="username">Username</label>
                @error('username')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div> --}}

            {{-- profile picture --}}
            <div class="mb-3">
              <label for="image" class="form-label fw-bolder">Profile Picture</label>
              @if ($data->image)
                <img src="{{ asset('storage/' . $data->image) }}" class="img-fluid img-preview mb-3 col-sm-5 d-block">              
              @else
                <img class="img-fluid img-preview mb-3 col-sm-5">              
              @endif
              <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
              @error('image')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <button class="btn btn-primary" type="submit">Save Changes</button>
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