<nav class="navbar navbar-expand-lg bg-body-tertiary user-select-none">
    <div class="container">
      <a class="navbar-brand fw-bolder" href="/"><i class="bi bi-book-half text-primary"></i> OSL</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/#features') ? 'active' : '' }}" aria-current="page" href="/#features">Features</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Courses
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/#course">Course List</a></li>
              <li><a class="dropdown-item" href="/courses">Search Course</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/about') ? 'active' : '' }}" href="/about">About</a>
          </li>
        </ul>
        @auth
          <ul class="nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->username }}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/users/{{ auth()->user()->username }}/dashboard/courses">Dashboard</a></li>
                <li>
                  <form action="/logout" method="POST" class="dropdown-item">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">Logout</button>
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        @else
          <a class="btn btn-primary" href="/login">SIGN IN</a>          
        @endauth
      </div>
    </div>
</nav>