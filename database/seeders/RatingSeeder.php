<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rating::create([
            'user_id' => 1,
            'course_id' => 1,
            'rating' => 5,
            'review' => 'The Vue.js fundamental course exceeded my expectations! The comprehensive explanations and hands-on projects helped me grasp the core concepts effortlessly.'
        ]);
        Rating::create([
            'user_id' => 2,
            'course_id' => 1,
            'rating' => 5,
            'review' => "I'm truly impressed with the Vue.js fundamental course. The step-by-step approach, real-world examples, and interactive exercises made learning Vue.js enjoyable and practical."
        ]);
        Rating::create([
            'user_id' => 3,
            'course_id' => 1,
            'rating' => 5,
            'review' => "Taking the Vue.js fundamental course was a game-changer for me. The instructor's clear explanations and engaging tutorials made even complex topics easy to understand."
        ]);
        Rating::create([
            'user_id' => 4,
            'course_id' => 1,
            'rating' => 5,
            'review' => "I can't recommend the Vue.js fundamental course enough. It's perfect for beginners like me who want to dive into front-end development. The course structure and practical exercises are top-notch."
        ]);
        Rating::create([
            'user_id' => 5,
            'course_id' => 1,
            'rating' => 5,
            'review' => 'The Vue.js fundamental course exceeded my expectations! The comprehensive explanations and hands-on projects helped me grasp the core concepts effortlessly.'
        ]);
        Rating::create([
            'user_id' => 6,
            'course_id' => 1,
            'rating' => 5,
            'review' => "As a beginner, the Vue.js fundamental course was a perfect fit. The instructor's expertise and the course structure guided me through the learning process smoothly."
        ]);
        // react
        Rating::create([
            'user_id' => 1,
            'course_id' => 2,
            'rating' => 5,
            'review' => 'The React.js fundamental course exceeded my expectations! The comprehensive explanations and hands-on projects helped me grasp the core concepts effortlessly.'
        ]);
        Rating::create([
            'user_id' => 2,
            'course_id' => 2,
            'rating' => 4,
            'review' => "I'm truly impressed with the Vue.js fundamental course. The step-by-step approach, real-world examples, and interactive exercises made learning React.js enjoyable and practical."
        ]);
        Rating::create([
            'user_id' => 3,
            'course_id' => 2,
            'rating' => 5,
            'review' => "Taking the React.js fundamental course was a game-changer for me. The instructor's clear explanations and engaging tutorials made even complex topics easy to understand."
        ]);
        // laravel
        Rating::create([
            'user_id' => 1,
            'course_id' => 3,
            'rating' => 5,
            'review' => "The Laravel for Beginners course was fantastic! The hands-on projects and explanations really helped me grasp the fundamentals of Laravel."
        ]);
        
        Rating::create([
            'user_id' => 2,
            'course_id' => 3,
            'rating' => 5,
            'review' => "I'm thoroughly impressed with the Laravel for Beginners course. The instructor's teaching style and the practical examples made learning Laravel enjoyable and easy."
        ]);
        
        Rating::create([
            'user_id' => 3,
            'course_id' => 3,
            'rating' => 5,
            'review' => "This course was a game-changer for me. The step-by-step approach and real-world applications of Laravel concepts were invaluable. Highly recommended!"
        ]);
        
        Rating::create([
            'user_id' => 4,
            'course_id' => 3,
            'rating' => 5,
            'review' => "I can't say enough good things about the Laravel for Beginners course. It provided a solid foundation in Laravel development, and the instructor's expertise shines through."
        ]);
        
        Rating::create([
            'user_id' => 5,
            'course_id' => 3,
            'rating' => 5,
            'review' => "The Laravel for Beginners course exceeded my expectations. The interactive lessons and clear explanations made learning Laravel a breeze."
        ]);
        
        Rating::create([
            'user_id' => 6,
            'course_id' => 3,
            'rating' => 5,
            'review' => "As a beginner, I found the Laravel for Beginners course to be incredibly valuable. The instructor's guidance and practical exercises made learning Laravel enjoyable."
        ]);
        // vue advanced
        Rating::create([
            'user_id' => 1,
            'course_id' => 6,
            'rating' => 5,
            'review' => "The Vue.js Advanced course was fantastic! The in-depth content and challenging projects helped me take my Vue.js skills to the next level."
        ]);
        
        Rating::create([
            'user_id' => 2,
            'course_id' => 6,
            'rating' => 5,
            'review' => "I'm thoroughly impressed with the Vue.js Advanced course. The instructor's expertise and the advanced topics covered really expanded my understanding of Vue.js."
        ]);
        
        Rating::create([
            'user_id' => 3,
            'course_id' => 6,
            'rating' => 5,
            'review' => "This course was a game-changer for me. The comprehensive coverage of advanced Vue.js concepts has significantly improved my ability to build sophisticated web applications."
        ]);
        
        Rating::create([
            'user_id' => 4,
            'course_id' => 6,
            'rating' => 4,
            'review' => "I can't say enough good things about the Vue.js Advanced course. The advanced projects and hands-on practice were invaluable for deepening my Vue.js knowledge."
        ]);
        
        Rating::create([
            'user_id' => 5,
            'course_id' => 6,
            'rating' => 5,
            'review' => "The Vue.js Advanced course exceeded my expectations. The complex topics were explained clearly, and I gained confidence in working with advanced Vue.js features."
        ]);
        
        Rating::create([
            'user_id' => 6,
            'course_id' => 6,
            'rating' => 4,
            'review' => "As a Vue.js enthusiast, I found the Vue.js Advanced course to be incredibly insightful. The advanced techniques and real-world applications provided a solid foundation for my projects."
        ]);        
    }
}
