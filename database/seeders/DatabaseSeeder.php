<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            StudentSeeder::class,
            DepartmentSeeder::class,
            CourseSeeder::class,
            ClassSeeder::class,
            ClassDetailSeeder::class,
        ]);
    }
}
