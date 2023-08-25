@extends('layouts.main')

@section('container')
<div class="container mt-5 user-select-none">
 
  <div class="container-fluid px-4 py-5 my-5 text-center">
    <div class="lc-block">
      <div editable="rich">
        <h2 class="display-5 fw-bold">Learning Beyond Boundaries</h2>
      </div>
    </div>
    <div class="lc-block col-lg-6 mx-auto mb-4">
      <div editable="rich">
  
        <p class="lead "> Elevate your skills, expand your horizons, and embrace the power of knowledge with OSL Training Course.</p>
      </div>
    </div>
  
    <div class="lc-block d-grid gap-2 d-sm-flex justify-content-sm-center">
      <div class="overflow-hidden">
        <div class="container px-5">
          <img class="img-fluid border rounded-3 shadow-lg mb-4" src="{{ asset('banner.jpg') }}">
        </div>
      </div>
    </div>
  </div> 
   
    
  
  <div class="row align-items-md-stretch" >
    <div class="col-md-6" id="features">
      <div class="h-100 p-5 text-bg-light rounded-3">
        <h2>Discover the Power of OSL Courses</h2>
        <ul class="list-unstyled px-3 fs-5">
          <li><i class="bi bi-trophy text-warning"></i> Earn a Recognized Certificate</li>
          <li><i class="bi bi-star-half text-danger"></i></i> Experience Ultimate Flexibility</li>
          <li><i class="bi bi-rocket-takeoff text-primary"> </i> Learn at Your Own Pace</li>
          <li><i class="bi bi-cash-coin text-success"></i> Completely Free of Charge</li>
        </ul>
        <h4>Unlock Your Potential with OSL Courses!</h4>
      </div>
    </div>
  
    <div class="col-md-6" id="testimonials">
      <div class="h-100 p-5 text-bg-dark rounded-3">
        <h2>Join Our Learning Community <i class="bi bi-flag text-danger"></i></h2>
        <p class="fs-5">Be a part of our community of learners. Whether you're a student, educator, or enthusiast, you can contribute, learn, and grow with us.</p>
        <a href="/login" class="btn btn-outline-primary fw-bold">Join Now</a>
      </div>
    </div>
  </div>
  
  <main>
    {{-- Section 1 --}}
    <section class="pt-5 text-center container"  id="course">
      <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
          <h2 class="fw-bolder">Start Learning</h2>
          <p class="lead">Explore our diverse collection of courses tailored to your interests and needs, and embark on a learning adventure that's uniquely yours.</p>
          <p>
          </p>
          </div>
      </div>
    </section>
  
    {{-- Section 2 --}}
    <div class="album py-5 bg-body-secondary rounded-3">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <div class="wrapper mx-auto">
            <i id="left" class="navigation bi bi-arrow-left z-3"></i>
              <ul class="carousel">
                @foreach ($data as $course)
                  <a class="card text-decoration-none user-select-none shadow" href="/courses/{{ $course->id }}">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light" style="width: 100%; height: 200px; overflow: hidden">
                      <img src="{{ asset('storage/' . $course->image) }}" class="img-fluid rounded-top" style="width: 100%; height: 100%; object-fit: cover" />
                    </div>
                    <div class="card-body" style="text-align: left; width: 90%">
                      <h2 class="card-title font-weight-bold mt-0 ml-0">{{ $course->title }}</h2>
                      <ul class="list-unstyled list-inline mb-0">
                        <li class="list-inline-item">
                          <p class="card-text lh-1">
                            {{ Illuminate\Support\Str::limit(strip_tags(html_entity_decode($course->description)), 100, '...') }}
                          </p>
                          <p class="text-muted lh-1"><i class="bi bi-person-fill text-primary"></i> {{ $course->users_count }} students enrolled</p>
                          <p class="text-muted lh-1"><i class="bi bi-star-fill text-warning"></i> {{ $course->rating }} ({{ $course->rating_users_count }})</p>
                          <p class="text-muted lh-1 text-capitalize"><i class="bi bi-reception-2 text-danger"></i> {{ $course->level }}</p>
                        </li>
                      </ul>
                    </div>
                  </a>
                @endforeach
              </ul>
            <i id="right" class="navigation bi bi-arrow-right"></i>
          </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-3 justify-content-center">
          <a class="btn btn-primary" href="/courses">
            Explore Full Catalog
          </a>
        </div>
      </div>
    </div>     
  </main>
  
  <div class="container pt-3 mt-4  border-top">
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="/" class="nav-link px-2 text-body-secondary">Home</a></li>
        <li class="nav-item"><a href="/#features" class="nav-link px-2 text-body-secondary">Features</a></li>
        <li class="nav-item"><a href="/#course" class="nav-link px-2 text-body-secondary">Courses</a></li>
        <li class="nav-item"><a href="/courses" class="nav-link px-2 text-body-secondary">Search Course</a></li>
        <li class="nav-item"><a href="/about" class="nav-link px-2 text-body-secondary">About</a></li>
      </ul>
      <p class="text-center text-body-secondary">© 2023 OSL</p>
    </footer>
  </div>
</div>
@endsection

@section('custom_js')
  <script src="{{ asset('js/slider.js') }}"></script>
@endsection