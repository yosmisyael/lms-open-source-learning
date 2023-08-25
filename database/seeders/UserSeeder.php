<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $student = User::create([
            'name' => 'Daniel',
            'username'=> 'dan',
            'email' => 'dan@lms.com',
            'password' => bcrypt('malas'),
            'image' => 'user-pictures/user-picture-1.jpg'
        ]);
        $student->assignRole('student');

        $student = User::create([
            'name' => 'Eliza Rod',
            'username'=> 'eliz',
            'email' => 'eliz@lms.com',
            'password' => bcrypt('malas'),
            'image' => 'user-pictures/user-picture-2.webp'
        ]);
        $student->assignRole('student');

        $student = User::create([
            'name' => 'Jake Elliot Martin',
            'username'=> 'jake',
            'email' => 'jake@lms.com',
            'password' => bcrypt('malas'),
            'image' => 'user-pictures/user-picture-3.webp'
        ]);
        $student->assignRole('student');

        $student = User::create([
            'name' => 'Charlotte Hughins',
            'username'=> 'lotte',
            'email' => 'lotte@lms.com',
            'password' => bcrypt('malas'),
            'image' => 'user-pictures/user-picture-4.webp'
        ]);
        $student->assignRole('student');
        
        $student = User::create([
            'name' => 'Marsha Angelina',
            'username'=> 'marsha',
            'email' => 'marsha@lms.com',
            'password' => bcrypt('malas'),
            'image' => 'user-pictures/user-picture-5.webp'
        ]);
        $student->assignRole('student');
        
        $student = User::create([
            'name' => 'Laurenzia Betty',
            'username'=> 'betty',
            'email' => 'betty@lms.com',
            'password' => bcrypt('malas'),
            'image' => 'user-pictures/user-picture-6.webp'
        ]);

        $student->assignRole('student');
    }
}
