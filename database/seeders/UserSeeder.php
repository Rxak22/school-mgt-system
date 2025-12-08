<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin account
        DB::table('users')->insert([
            'name' => 'Admin Rxak',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Sample teacher names
        $teachers = [
            'Sophia Chan', 
            'Rithy Sok', 
            'Sopheak Vann', 
            'Sokha Meas', 
            'Piseth Kim'
        ];

        foreach ($teachers as $index => $teacher) {
            DB::table('users')->insert([
                'name' => $teacher,
                'email' => "teacher".($index+1)."@gmail.com",
                'password' => Hash::make('password123'),
                'role' => 'teacher',
            ]);
        }

        // Sample student names
        $students = [
            'Ratanak Heng',
            'Sreymom Chheang',
            'Sovannara Nguon',
            'Pisey Keo',
            'Vireak Chum',
            'Sreyneang Touch',
            'Dara Kheang',
            'Ravy Lim',
            'Sopheap Mao',
            'Vannak Phan'
        ];

        foreach ($students as $index => $student) {
            DB::table('users')->insert([
                'name' => $student,
                'email' => "student".($index+1)."@gmail.com",
                'password' => Hash::make('password123'),
                'role' => 'student',
            ]);
        }
    }
}
