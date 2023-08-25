<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
    @if(Request::is('/'))
        OSL | Home
    @elseif(Request::is('about'))
        OSL | About Us
    @elseif(Request::is('courses'))
        OSL | Courses
    @elseif(Request::is('courses/*'))
        @php
        $courseId = explode('/', Request::path())[1];
        $course = App\Models\Course::find($courseId);
        @endphp
        @if($course)
            OSL | {{ $course->title }}
        @else
            OSL
        @endif
    @elseif(Request::is('login'))
        OSL | Login
    @elseif(Request::is('register'))
        OSL | Register
    @endif
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
    @yield('custom_css')
</head>
<body>
    @include('partials.navbar')
    @yield('container')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    @yield('custom_js')
</body>
</html>

