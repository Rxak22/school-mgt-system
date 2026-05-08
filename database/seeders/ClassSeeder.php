<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('classes')->insert([
            ['id' => 1, 'name' => 'SLS', 'room_number' => '406', 'building' => 'A', 'number_of_student' => 0, 'teacher_id' => 1, 'department_id' => 1],
            ['id' => 2, 'name' => 'M1',  'room_number' => '205', 'building' => 'B', 'number_of_student' => 0, 'teacher_id' => 1, 'department_id' => 1],
            ['id' => 3, 'name' => 'M5',  'room_number' => '302', 'building' => 'A', 'number_of_student' => 0, 'teacher_id' => 1, 'department_id' => 3],
            ['id' => 4, 'name' => 'M6',  'room_number' => '303', 'building' => 'B', 'number_of_student' => 0, 'teacher_id' => 1, 'department_id' => 1],
            ['id' => 5, 'name' => 'E1',  'room_number' => '104', 'building' => 'A', 'number_of_student' => 0, 'teacher_id' => 1, 'department_id' => 9],
            ['id' => 6, 'name' => 'E2',  'room_number' => '208', 'building' => 'B', 'number_of_student' => 0, 'teacher_id' => 1, 'department_id' => 11],
            ['id' => 7, 'name' => 'E4',  'room_number' => '312', 'building' => 'T', 'number_of_student' => 0, 'teacher_id' => 1, 'department_id' => 7],
            ['id' => 8, 'name' => 'E4',  'room_number' => '115', 'building' => 'C', 'number_of_student' => 0, 'teacher_id' => 1, 'department_id' => 12],
        ]);
    }
}
