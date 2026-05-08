<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            ['id' => 200, 'name' => 'Sophea Kim',       'email' => 'sophea.kim@gmail.com',       'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 201, 'name' => 'Dara Sok',         'email' => 'dara.sok@gmail.com',         'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 202, 'name' => 'Maly Chann',       'email' => 'maly.chann@gmail.com',       'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 203, 'name' => 'Rithy Pov',        'email' => 'rithy.pov@gmail.com',        'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 204, 'name' => 'Sreynich Hou',     'email' => 'sreynich.hou@gmail.com',     'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 205, 'name' => 'Bunthoeun Yem',    'email' => 'bunthoeun.yem@gmail.com',    'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 206, 'name' => 'Channary Pen',     'email' => 'channary.pen@gmail.com',     'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 207, 'name' => 'Nary Tep',         'email' => 'nary.tep@gmail.com',         'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 208, 'name' => 'Sokhom Rath',      'email' => 'sokhom.rath@gmail.com',      'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 209, 'name' => 'Leakhena Say',     'email' => 'leakhena.say@gmail.com',     'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 210, 'name' => 'Makara Oum',       'email' => 'makara.oum@gmail.com',       'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 211, 'name' => 'Sreyneang Kang',   'email' => 'sreyneang.kang@gmail.com',   'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 212, 'name' => 'Theara Seng',      'email' => 'theara.seng@gmail.com',      'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 213, 'name' => 'Kalyan Nuth',      'email' => 'kalyan.nuth@gmail.com',      'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 214, 'name' => 'Pichda Ros',       'email' => 'pichda.ros@gmail.com',       'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 215, 'name' => 'Mengly Hout',      'email' => 'mengly.hout@gmail.com',      'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 216, 'name' => 'Sokunthea Iv',     'email' => 'sokunthea.iv@gmail.com',     'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 217, 'name' => 'Vicheka Chou',     'email' => 'vicheka.chou@gmail.com',     'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 218, 'name' => 'Sreypich Morn',    'email' => 'sreypich.morn@gmail.com',    'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 219, 'name' => 'Rotanak Kuy',      'email' => 'rotanak.kuy@gmail.com',      'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 220, 'name' => 'Chanlina Prum',    'email' => 'chanlina.prum@gmail.com',    'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 221, 'name' => 'Sokchea Tan',      'email' => 'sokchea.tan@gmail.com',      'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 222, 'name' => 'Davuth Lorn',      'email' => 'davuth.lorn@gmail.com',      'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 223, 'name' => 'Kimhong Yun',      'email' => 'kimhong.yun@gmail.com',      'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 224, 'name' => 'Sreymeas Ouk',     'email' => 'sreymeas.ouk@gmail.com',     'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 225, 'name' => 'Panha Khiev',      'email' => 'panha.khiev@gmail.com',      'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 226, 'name' => 'Rathana Ek',       'email' => 'rathana.ek@gmail.com',       'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 227, 'name' => 'Channara Suon',    'email' => 'channara.suon@gmail.com',    'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 228, 'name' => 'Seyha Meak',       'email' => 'seyha.meak@gmail.com',       'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 229, 'name' => 'Borei Khim',       'email' => 'borei.khim@gmail.com',       'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 230, 'name' => 'Sochannel Leng',   'email' => 'sochannel.leng@gmail.com',   'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 231, 'name' => 'Kimsan Peng',      'email' => 'kimsan.peng@gmail.com',      'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 232, 'name' => 'Sreyleak Noun',    'email' => 'sreyleak.noun@gmail.com',    'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 233, 'name' => 'Bunthan Chhay',    'email' => 'bunthan.chhay@gmail.com',    'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 234, 'name' => 'Kannitha Mao',     'email' => 'kannitha.mao@gmail.com',     'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 235, 'name' => 'Sovannak Ith',     'email' => 'sovannak.ith@gmail.com',     'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 236, 'name' => 'Rachana Tong',     'email' => 'rachana.tong@gmail.com',     'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 237, 'name' => 'Pheakdey Nhep',    'email' => 'pheakdey.nhep@gmail.com',    'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 238, 'name' => 'Sovatey Chhun',    'email' => 'sovatey.chhun@gmail.com',    'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 239, 'name' => 'Lindarith Eang',   'email' => 'lindarith.eang@gmail.com',   'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 240, 'name' => 'Sreymoch Sar',     'email' => 'sreymoch.sar@gmail.com',     'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 241, 'name' => 'Vuthy Khem',       'email' => 'vuthy.khem@gmail.com',       'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 242, 'name' => 'Sokmony Pen',      'email' => 'sokmony.pen@gmail.com',      'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 243, 'name' => 'Pichchenda Ly',    'email' => 'pichchenda.ly@gmail.com',    'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 244, 'name' => 'Mengsour Tiv',     'email' => 'mengsour.tiv@gmail.com',     'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 245, 'name' => 'Sreyneth Hak',     'email' => 'sreyneth.hak@gmail.com',     'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 246, 'name' => 'Chhouy Keo',       'email' => 'chhouy.keo@gmail.com',       'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 247, 'name' => 'Sokhunthea Pich',  'email' => 'sokhunthea.pich@gmail.com',  'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 248, 'name' => 'Reaksmey Suos',    'email' => 'reaksmey.suos@gmail.com',    'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 249, 'name' => 'Vitou Chea',       'email' => 'vitou.chea@gmail.com',       'password' => Hash::make('password'), 'role' => 'student', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
