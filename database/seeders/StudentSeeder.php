<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
            'Vannak Phan',
            'Chan Dara',
            'Sokunthea Lim',
            'Malis Chhorn',
            'Narin Tep',
            'Sophal Kim',
            'Borey Ouk',
            'Sothea Phok',
            'Visal Pen',
            'Dalin Yim',
            'Pheaktra Chea',
            'Kosal Touch',
            'Sokha Heng',
            'Sreypov Chan',
            'Rithy Sun',
            'Vanna Chhit',
            'Sovichea Prak',
            'Nary Kim',
            'Dany Mao',
            'Bopha Lim',
            'Raksmey Oun',
            'Thida Sok',
            'Ratha Chhun',
            'Phearun Long',
            'Sokhem Chhim',
            'Piseth Oeun',
            'Mony Roth',
            'Savin Chhay',
            'Kunthea Yin',
            'Sambath Ly',
            'Sreymao Khiev',
            'Nimol Koy',
            'Rina Hor',
            'Pich Sophea',
            'Vicheka Nop',
            'Sokun Mean',
            'Nary Chhoeun',
            'Daro Meas',
            'Sokly Tan',
            'Sopheaktra Ung',
            'Bunthoeun Heang',
            'Monyreak Yos',
            'Sotheary Eang',
            'Pisey Chab',
            'Vuthy Kong',
            'Sreyleak Pov',
            'Sokuntheary Kim',
            'Rathanak Say',
            'Davy Nhem',
            'Borey Touch',
            'Sopanha Keat',
            'Nita Leng',
            'Kosal Chann',
            'Sovath Tep',
            'Sreyneat Ou',
            'Rachana Kim',
            'Dalin Nop',
            'Chanvibol Men',
            'Sokhorn Chhay',
            'Panhavuth Sim',
            'Sopheap Chan',
            'Vannary Long',
            'Thyda Meach',
            'Narith Khun',
            'Pichenda Mok',
            'Sokchea Mao',
            'Sreypich Heng',
            'Bunna Rin',
            'Rithisak Chhun',
            'Kimleng Hor',
            'Sokvisal Oum',
            'Malis Khiev',
            'Dara Pheng',
            'Soknita Chhim',
            'Ravy Khut',
            'Chanmony Lim',
            'Sovannarith Nget',
            'Sreymarch Tep',
            'Bophary Ung',
            'Pisal Yin',
            'Sophal Chhay',
            'Kaknika Phan',
            'Sothearith Mao',
            'Rina Touch',
            'Dalis Pov',
            'Sokreach Meas',
            'Vibol Heng',
            'Sokha Noun',
            'Sreyka Ean',
            'Narong Chhit',
            'Sophea Ly',
            'Daro Chhun'
        ];

        foreach ($students as $index => $student) {
            $studentEmail = strtolower(str_replace(' ', '.', $student)) . "@gmail.com";
            DB::table('users')->insert([
                'name' => $student,
                'email' => $studentEmail,
                'password' => Hash::make('password123'),
                'role' => 'student',
            ]);
        }
    }
}
