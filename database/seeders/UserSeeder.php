<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            ['id' => 1,   'name' => 'Admin',           'email' => 'admin@gmail.com',          'password' => Hash::make('password'), 'role' => 'admin',   'created_at' => now(), 'updated_at' => now()],
            ['id' => 2,   'name' => 'Teacher One',     'email' => 'teacher@gmail.com',        'password' => Hash::make('password'), 'role' => 'teacher', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3,   'name' => 'Student One',     'email' => 'student@gmail.com',        'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7,   'name' => 'Sokha Meas',      'email' => 'sokha.meas@gmail.com',     'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8,   'name' => 'Dara Kem',        'email' => 'dara.kem@gmail.com',       'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9,   'name' => 'Sreyla Phan',     'email' => 'sreyla.phan@gmail.com',    'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10,  'name' => 'Virak Noun',      'email' => 'virak.noun@gmail.com',     'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11,  'name' => 'Chanthy Ros',     'email' => 'chanthy.ros@gmail.com',    'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12,  'name' => 'Pisey Lim',       'email' => 'pisey.lim@gmail.com',      'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 13,  'name' => 'Ratanak Chan',    'email' => 'ratanak.chan@gmail.com',   'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 14,  'name' => 'Sotheary Keo',    'email' => 'sotheary.keo@gmail.com',   'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 15,  'name' => 'Bopha Sorn',      'email' => 'bopha.sorn@gmail.com',     'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 16,  'name' => 'Menghour Yit',    'email' => 'menghour.yit@gmail.com',   'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 18,  'name' => 'Lyda Heng',       'email' => 'lyda.heng@gmail.com',      'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 21,  'name' => 'Kosal Prak',      'email' => 'kosal.prak@gmail.com',     'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 29,  'name' => 'Sreymom Tith',    'email' => 'sreymom.tith@gmail.com',   'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 30,  'name' => 'Vanna Sok',       'email' => 'vanna.sok@gmail.com',      'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 31,  'name' => 'Chanda Oun',      'email' => 'chanda.oun@gmail.com',     'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 32,  'name' => 'Davan Chhum',     'email' => 'davan.chhum@gmail.com',    'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 33,  'name' => 'Socheata Im',     'email' => 'socheata.im@gmail.com',    'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 34,  'name' => 'Piseth Nhem',     'email' => 'piseth.nhem@gmail.com',    'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 35,  'name' => 'Samnang Phy',     'email' => 'samnang.phy@gmail.com',    'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 108, 'name' => 'Bophary Ung',     'email' => 'bophary.ung@gmail.com',    'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 109, 'name' => 'Pisal Yin',       'email' => 'pisal.yin@gmail.com',      'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 110, 'name' => 'Sophal Chhay',    'email' => 'sophal.chhay@gmail.com',   'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 111, 'name' => 'Kaknika Phan',    'email' => 'kaknika.phan@gmail.com',   'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 112, 'name' => 'Sothearith Mao',  'email' => 'sothearith.mao@gmail.com', 'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 113, 'name' => 'Rina Touch',      'email' => 'rina.touch@gmail.com',     'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 114, 'name' => 'Dalis Pov',       'email' => 'dalis.pov@gmail.com',      'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 115, 'name' => 'Sokreach Meas',   'email' => 'sokreach.meas@gmail.com',  'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 116, 'name' => 'Vibol Heng',      'email' => 'vibol.heng@gmail.com',     'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 117, 'name' => 'Sokha Noun',      'email' => 'sokha.noun@gmail.com',     'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 118, 'name' => 'Sreyka Ean',      'email' => 'sreyka.ean@gmail.com',     'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 119, 'name' => 'Narong Chhit',    'email' => 'narong.chhit@gmail.com',   'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 120, 'name' => 'Sophea Ly',       'email' => 'sophea.ly@gmail.com',      'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 121, 'name' => 'Daro Chhun',      'email' => 'daro.chhun@gmail.com',     'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
