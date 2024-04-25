<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Department::create([
            'id' => 1,
            'name' => 'Computer Science',
        ]);

        User::create([
            'id' => 1,
            'name' => 'userCS',
            'nim' => '123412341234',
            'email' => 'userCS@test.com',
            'password' => bcrypt('password'),
            'department_id' => 1,
        ]);

        Course::create([
            'id' => 1,
            'name' => 'Basic Programming',
            'code' => 'BP',
            'credit' => 3,
            'department_id' => 1
        ]);

        Course::create([
            'id' => 2,
            'name' => 'Object Oriented Programming',
            'code' => 'OOP',
            'credit' => 3,
            'department_id' => 1
        ]);

        Course::create([
            'id' => 3,
            'name' => 'Algorithm and Data Structure',
            'code' => 'ADS',
            'credit' => 3,
            'department_id' => 1
        ]);

        DB::table('course_user')->insert([
            'course_id' => 1,
            'user_id' => 1
        ]);
        
        Department::create([
            'id' => 2,
            'name' => 'Electrical Engineering',
        ]);

        User::create([
            'id' => 2,
            'name' => 'userEE',
            'nim' => '123412341234',
            'email' => 'userEE@test.com',
            'password' => bcrypt('password'),
            'department_id' => 1,
        ]);

        Course::create([
            'id' => 4,
            'name' => 'Introduction to Electrical Engineering',
            'code' => 'IEE',
            'credit' => 3,
            'department_id' => 2
        ]);

        Course::create([
            'id' => 5,
            'name' => 'Circuits and Electronics',
            'code' => 'CE',
            'credit' => 3,
            'department_id' => 2
        ]);

        Course::create([
            'id' => 6,
            'name' => 'Signals and Systems',
            'code' => 'SS',
            'credit' => 3,
            'department_id' => 2
        ]);

        DB::table('course_user')->insert([
            'course_id' => 4,
            'user_id' => 2
        ]);
    }
}
