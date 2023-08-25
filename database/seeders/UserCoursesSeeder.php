<?php

namespace Database\Seeders;

use App\Models\UserCourse;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserCoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserCourse::create([
            'user_id' => 1,
            'course_id' => 1,
            'is_completed' => 1,
            'progress' => 0,
            'score' => 100
        ]);
        UserCourse::create([
            'user_id' => 2,
            'course_id' => 1,
            'is_completed' => 1,
            'progress' => 0,
            'score' => 100
        ]);
        UserCourse::create([
            'user_id' => 3,
            'course_id' => 1,
            'is_completed' => 1,
            'progress' => 0,
            'score' => 100
        ]);
        UserCourse::create([
            'user_id' => 4,
            'course_id' => 1,
            'is_completed' => 1,
            'progress' => 0,
            'score' => 100
        ]);
        UserCourse::create([
            'user_id' => 5,
            'course_id' => 1,
            'is_completed' => 1,
            'progress' => 0,
            'score' => 100
        ]);
        UserCourse::create([
            'user_id' => 6,
            'course_id' => 1,
            'is_completed' => 1,
            'progress' => 0,
            'score' => 100
        ]);
        UserCourse::create([
            'user_id' => 3,
            'course_id' => 2,
            'is_completed' => 1,
            'progress' => 0,
            'score' => 100
        ]);
        UserCourse::create([
            'user_id' => 2,
            'course_id' => 2,
            'is_completed' => 1,
            'progress' => 0,
            'score' => 100
        ]);
        UserCourse::create([
            'user_id' => 1,
            'course_id' => 2,
            'is_completed' => 1,
            'progress' => 0,
            'score' => 100
        ]);
        // laravel
        UserCourse::create([
            'user_id' => 1,
            'course_id' => 3,
            'is_completed' => 1,
            'progress' => 0,
            'score' => 100
        ]);
        UserCourse::create([
            'user_id' => 2,
            'course_id' => 3,
            'is_completed' => 1,
            'progress' => 0,
            'score' => 100
        ]);
        UserCourse::create([
            'user_id' => 3,
            'course_id' => 3,
            'is_completed' => 1,
            'progress' => 0,
            'score' => 100
        ]);
        UserCourse::create([
            'user_id' => 4,
            'course_id' => 3,
            'is_completed' => 1,
            'progress' => 0,
            'score' => 100
        ]);
        UserCourse::create([
            'user_id' => 5,
            'course_id' => 3,
            'is_completed' => 1,
            'progress' => 0,
            'score' => 100
        ]);
        UserCourse::create([
            'user_id' => 6,
            'course_id' => 3,
            'is_completed' => 1,
            'progress' => 0,
            'score' => 100
        ]);
        UserCourse::create([
            'user_id' => 1,
            'course_id' => 4,
            'is_completed' => 1,
            'progress' => 0,
            'score' => 100
        ]);
        UserCourse::create([
            'user_id' => 2,
            'course_id' => 4,
            'is_completed' => 1,
            'progress' => 0,
            'score' => 100
        ]);
        UserCourse::create([
            'user_id' => 3,
            'course_id' => 4,
            'is_completed' => 1,
            'progress' => 0,
            'score' => 100
        ]);
        UserCourse::create([
            'user_id' => 4,
            'course_id' => 4,
            'is_completed' => 1,
            'progress' => 0,
            'score' => 100
        ]);
        UserCourse::create([
            'user_id' => 5,
            'course_id' => 4,
            'is_completed' => 1,
            'progress' => 0,
            'score' => 100
        ]);
        UserCourse::create([
            'user_id' => 6,
            'course_id' => 4,
            'is_completed' => 1,
            'progress' => 0,
            'score' => 100
        ]);
    }
}
