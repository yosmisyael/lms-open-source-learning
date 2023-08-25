@extends('layouts.main')
{{-- @dd($course_ratings) --}}
@section('container')
<div class="d-flex container rounded" lc-helper="background" style="height:50vh;background:url({{ asset('storage/'.$data->image) }}) center/cover no-repeat;">
</div>
<div class="container p-5 bg-light rounded shadow" style="margin-top: -50px; max-width: 500px">
	<div class="row">
		<div class="col-md-4 text-center align-self-center">
      <div>
        <i class="bi bi-journal-code fs-3 text-primary"></i>
        <p class="text-secondary fs-3"> {{ $data->total_lessons }} lessons</p>
      </div>
		</div><!-- /col -->
		<div class="col-md-4 text-center align-self-center">
      <div>
        <i class="bi bi-pencil-square fs-3 text-danger"></i>
        <p class="text-secondary fs-3"> 1 test</p>
      </div>
		</div><!-- /col -->
		<div class="col-md-4 text-center align-self-center">
      <div>
        <i class="bi bi-patch-check fs-3 text-success"></i>
        <p class="text-secondary fs-3"> Certificate</p>
      </div>
		</div><!-- /col -->
	</div>
</div>
<div class="container p-5 px-3">
  <h3>Description</h3>
  {{ $data->description }}
</div>
{{-- testi --}}
 
  
<div class="container py-5">
	<div class="row mb-4">
		<div class="col-md-12 text-center">
			<div class="lc-block mb-4">
					<h2 editable="inline" class="rfs-25 fw-bolder">Testimonials</h2>  
				<p editable="inline"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc et metus id<br> ligula malesuada placerat sit amet quis enim.</p>
			</div><!-- /lc-block -->
		</div>
	</div>
	<div class="row justify-content-center">
    @foreach ($course_ratings as $rating)
      <div class="col-md-8 col-lg-4 mb-4">
        <div class="card border-0 shadow">
          <div class="card-body py-4">
            <div class="d-flex">
              <img class="rounded-circle" style="width:48px;height:48px" src="@if ($rating->image == null)
              {{ asset('storage/user-pictures/default.svg') }}
              @else
              {{ asset('storage/'.$rating->image) }}
              @endif" sizes="(max-width: 1080px) 100vw, 1080px" width="1080" height="1080">
              <div class="ps-2">
                <h4 editable="inline" class="rfs-7 ms-2">{{ $rating->name }}</h4>
              </div>
            </div>
            <div class="text-muted">
              <div editable="rich">
                <p>{{ $rating->pivot->review }}
                </p>
              </div>
            </div>
            <div class="text-warning">
              @foreach (range(1, $rating->pivot->rating) as $star)
              <i class="bi bi-star-fill"></i>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    @endforeach
	</div>
</div> 
 
  
@endsection