<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseEnrollmentController;
use App\Http\Controllers\DashboardCourseController;
use App\Http\Controllers\DashboardLessonController;
use App\Http\Controllers\DashboardQuestionController;
use App\Http\Controllers\DashboardTestController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/courses', [CourseController::class, 'index']);

Route::get('/courses/{id}', [CourseController::class, 'show']);

Route::post('/course/{id}/rating', [RatingController::class, 'store']);

Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('guest');

Route::post('/admin', [AdminController::class, 'authenticate']);

Route::post('/admin/logout', [AdminController::class, 'logout']);

Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard/courses', function () {
        return view('dashboard.admin.courses');
    });

    Route::get('/admin/dashboard/users', function () {
        return view('dashboard.admin.users');
    });

    Route::get('/admin/dashboard/tests', function () {
        return view('dashboard.admin.tests');
    });
});

Route::resource('/admin/dashboard/users', DashboardUserController::class)->middleware('admin');

Route::resource('/admin/dashboard/courses', DashboardCourseController::class)->middleware('admin');

Route::put('/courses/{course}/publish', [DashboardCourseController::class, 'publish'])->name('courses.publish');

Route::resource('/admin/dashboard/courses.lesson', DashboardLessonController::class)->middleware('admin');

Route::resource('/admin/dashboard/tests', DashboardTestController::class)->middleware('admin');

Route::resource('/admin/dashboard/tests.questions', DashboardQuestionController::class)->middleware('admin');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('/enroll/{course_id}', [CourseEnrollmentController::class,'enroll']);

Route::middleware('role:student')->get('/users/{username}/dashboard/courses', [UserCourseController::class, 'index'])->middleware(['auth']);

Route::middleware('role:student')->get('/users/{username}/dashboard/courses/{course_id}', [UserCourseController::class, 'show'])->middleware(['auth']);

Route::middleware('role:student')->get('/users/{username}/dashboard/courses/{course_id}/lesson/{lesson_id}', [UserCourseController::class, 'showLesson'])->middleware(['auth']);

Route::middleware('role:student')->get('/users/{username}/dashboard/courses/{course_id}/test/{test_id}', [UserCourseController::class, 'test'])->middleware(['auth']);

Route::middleware('role:student')->post('/users/{username}/dashboard/courses/{course_id}/test/{test_id}', [UserCourseController::class, 'grade'])->middleware(['auth']);

Route::middleware('role:student')->get('/users/{username}/dashboard/courses/{course_id}/review', [RatingController::class, 'index'])->middleware(['auth']);

Route::middleware('role:student')->get('/users/{username}/dashboard/courses/{course_id}/review/edit', [RatingController::class, 'edit'])->middleware(['auth']);

Route::middleware('role:student')->post('/users/{username}/dashboard/courses/{course_id}/review', [RatingController::class, 'store'])->middleware(['auth']);

Route::middleware('role:student')->put('/users/{username}/dashboard/courses/{course_id}/review', [RatingController::class, 'update'])->middleware(['auth']);

Route::middleware('role:student')->post('/users/{username}/dashboard/courses/{course_id}/certificate', [CertificateController::class, 'process']);

Route::middleware('role:student')->get('/users/{username}/dashboard/profile', [UserProfileController::class, 'show']);

Route::middleware('role:student')->get('/users/{username}/dashboard/profile/edit', [UserProfileController::class, 'edit']);

Route::middleware('role:student')->put('/users/{username}/dashboard/profile', [UserProfileController::class, 'update']);