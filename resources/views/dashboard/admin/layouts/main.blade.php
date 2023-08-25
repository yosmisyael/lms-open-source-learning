<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
    @if(Request::is('admin/dashboard/users'))
        OSL | Administrator - Users
    @elseif (Request::is('admin/dashboard/courses'))
        OSL | Administrator - Courses
        @elseif(Request::is('admin/dashboard/courses/*'))
        @php
            $courseId = explode('/', Request::path())[3];
            $course = App\Models\Course::find($courseId);
            if ($course) {
                $name = $course->title;
            }
        @endphp
        @if($course && $name)
            OSL | {{ $name }}
        @else
            OSL
        @endif
    @elseif (Request::is('admin/dashboard/tests'))
        OSL | Administrator - Test
    @elseif(Request::is('admin/dashboard/tests/*'))
        @php
            $testId = explode('/', Request::path())[3];
            $test = App\Models\Test::find($testId);
            if ($test) {
                $testName = $test->name;
            } else {
                $testName = '';
            }
        @endphp
        @if($testName)
            OSL | {{ $testName }}
        @else
            OSL
        @endif
    @else
        OSL
    @endif
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script defer type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    @yield('style')
</head>
<body id="body-pd">
    @include('dashboard.admin.layouts.header')
    
    @include('dashboard.admin.layouts.sidebar')

    <div class="height-100 bg-light">
        @yield('container')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>

